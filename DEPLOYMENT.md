# Deployment Guide

This guide explains how to deploy the Dhammasambhava application to your Hetzner server.

## Prerequisites

- Hetzner server at `46.62.138.177`
- SSH access with key: `~/.ssh/id_rsa_personal`
- Ansible installed on your local machine
- GitHub repository set up

## Quick Start

### 1. Generate Application Key

```bash
php artisan key:generate --show
```

Save this key - you'll need it for deployment.

### 2. Set Up GitHub Secrets

Go to your GitHub repository → Settings → Secrets and variables → Actions

Add the following secrets:

1. **SSH_PRIVATE_KEY**
   ```bash
   cat ~/.ssh/id_rsa_personal
   ```
   Copy the entire output and paste as the secret value

2. **APP_KEY**
   - Use the key generated in step 1

3. **ANSIBLE_VAULT_PASSWORD** (optional)
   - Create a strong password for encrypting sensitive data
   - Example: `openssl rand -base64 32`

### 3. Update Configuration

Edit `ansible/inventory.yml`:
- Update `app_domain` to your actual domain name
- Adjust PHP version if needed

### 4. Initial Server Setup

Run the initial setup to install all required packages:

```bash
# Set your APP_KEY
export APP_KEY="base64:YOUR_APP_KEY_HERE"

# Run setup
./deploy.sh setup
```

This will:
- Install Nginx, PHP 8.4, Node.js
- Configure server and create directories
- Set up database and storage

### 5. Deploy Application

```bash
# Deploy latest code
./deploy.sh deploy
```

Or push to GitHub and let GitHub Actions handle it:

```bash
git add .
git commit -m "Deploy to production"
git push origin main
```

## Deployment Methods

### Method 1: Automatic (GitHub Actions)

Every push to `main` branch triggers automatic deployment:

1. Push your changes to GitHub
2. GitHub Actions runs tests
3. If tests pass, deploys to server
4. Check workflow status in "Actions" tab

### Method 2: Manual (Local)

Use the deployment script:

```bash
# Initial setup
APP_KEY=base64:xxx ./deploy.sh setup

# Deploy application
APP_KEY=base64:xxx ./deploy.sh deploy

# Update config only
APP_KEY=base64:xxx ./deploy.sh config

# Full deployment
APP_KEY=base64:xxx ./deploy.sh full
```

### Method 3: Direct Ansible

```bash
cd ansible

# Run full deployment
ansible-playbook deploy.yml -i inventory.yml -e "app_key=base64:xxx"

# Run specific tags
ansible-playbook deploy.yml -i inventory.yml --tags setup
ansible-playbook deploy.yml -i inventory.yml --tags deploy
ansible-playbook deploy.yml -i inventory.yml --tags config
```

## Server Structure

```
/var/www/dhammasambhava/
├── current/              # Symlink to current release
├── releases/
│   ├── 1234567890/      # Release timestamp
│   ├── 1234567891/
│   └── ...
└── shared/              # Shared across releases
    ├── storage/
    └── database/
        └── database.sqlite
```

## Post-Deployment

### Check Application Status

```bash
# SSH into server
ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177

# Check Nginx status
systemctl status nginx

# Check PHP-FPM status
systemctl status php8.4-fpm

# View application logs
tail -f /var/www/dhammasambhava/current/storage/logs/laravel.log

# View Nginx logs
tail -f /var/log/nginx/dhammasambhava_error.log
```

### Run Artisan Commands

```bash
cd /var/www/dhammasambhava/current

# Clear cache
php artisan cache:clear

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed
```

## Rollback

If something goes wrong, rollback to previous release:

```bash
ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177

cd /var/www/dhammasambhava

# List releases
ls -la releases/

# Update symlink to previous release
ln -sfn /var/www/dhammasambhava/releases/PREVIOUS_TIMESTAMP /var/www/dhammasambhava/current

# Reload services
systemctl reload nginx
systemctl reload php8.4-fpm
```

## SSL/HTTPS Setup (Recommended)

After initial deployment, set up SSL with Let's Encrypt:

```bash
ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177

# Install Certbot
apt install certbot python3-certbot-nginx

# Get SSL certificate
certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Auto-renewal is set up automatically
# Test renewal with:
certbot renew --dry-run
```

## Troubleshooting

### Permission Issues

```bash
cd /var/www/dhammasambhava/current
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### Database Issues

```bash
# Check if SQLite file exists
ls -la /var/www/dhammasambhava/shared/database/database.sqlite

# Check permissions
chown www-data:www-data /var/www/dhammasambhava/shared/database/database.sqlite
chmod 664 /var/www/dhammasambhava/shared/database/database.sqlite
```

### Nginx 502 Error

```bash
# Check PHP-FPM is running
systemctl status php8.4-fpm

# Check PHP-FPM logs
tail -f /var/log/php8.4-fpm.log

# Restart PHP-FPM
systemctl restart php8.4-fpm
```

### Assets Not Loading

```bash
cd /var/www/dhammasambhava/current

# Rebuild assets
npm run build

# Clear cache
php artisan cache:clear
php artisan view:clear
```

## Security Checklist

- [ ] APP_KEY is set and kept secret
- [ ] APP_DEBUG is set to `false` in production
- [ ] Database file has correct permissions (664)
- [ ] Storage directory has correct permissions (775)
- [ ] Firewall is configured (UFW recommended)
- [ ] SSH password authentication is disabled
- [ ] SSL certificate is installed
- [ ] Nginx security headers are configured

## Monitoring

### Set Up Monitoring (Optional)

```bash
# Install monitoring tools
apt install htop iotop

# Monitor disk space
df -h

# Monitor memory
free -h

# Monitor processes
htop
```

### Log Rotation

Laravel logs are stored in `storage/logs/`. Set up log rotation:

```bash
nano /etc/logrotate.d/dhammasambhava
```

```
/var/www/dhammasambhava/current/storage/logs/*.log {
    daily
    rotate 14
    compress
    delaycompress
    notifempty
    create 0664 www-data www-data
    sharedscripts
}
```

## Support

For issues or questions:
- Check application logs: `/var/www/dhammasambhava/current/storage/logs/laravel.log`
- Check Nginx logs: `/var/log/nginx/dhammasambhava_error.log`
- Review GitHub Actions workflow runs
- Test locally with `php artisan serve` and compare behavior

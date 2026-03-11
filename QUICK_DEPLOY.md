# Quick Deployment Guide

Get your Dhammasambhava application live in 5 steps!

## Step 1: Generate Application Key

```bash
php artisan key:generate --show
```

Copy the output (something like `base64:xxxxxxxxxxxxxxx`)

## Step 2: Add GitHub Secrets

Go to: GitHub Repository → Settings → Secrets and variables → Actions

Add these 3 secrets:

| Secret Name | How to Get It | Example |
|-------------|---------------|---------|
| `SSH_PRIVATE_KEY` | `cat ~/.ssh/id_rsa_personal` | Copy entire output |
| `APP_KEY` | Output from Step 1 | `base64:xxx...` |
| `ANSIBLE_VAULT_PASSWORD` | `openssl rand -base64 32` | Any strong password |

## Step 3: Update Domain (Optional)

Edit [ansible/inventory.yml](ansible/inventory.yml) line 9:
```yaml
app_domain: yourdomain.com  # Change to your actual domain
```

If you don't have a domain yet, you can use the IP address (46.62.138.177) for now.

## Step 4: Initial Server Setup

```bash
export APP_KEY="YOUR_APP_KEY_FROM_STEP_1"
./deploy.sh setup
```

This takes 5-10 minutes and sets up everything on the server.

## Step 5: Deploy

```bash
git add .
git commit -m "Initial deployment setup"
git push origin main
```

GitHub Actions will automatically deploy! ✨

## Check Your Site

Visit: http://46.62.138.177 (or your domain)

## What's Next?

1. **Set up SSL** (recommended):
   ```bash
   ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177
   apt install certbot python3-certbot-nginx
   certbot --nginx -d yourdomain.com
   ```

2. **Seed the database**:
   ```bash
   ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177
   cd /var/www/dhammasambhava/current
   php artisan db:seed
   ```

3. **Create admin user** for Filament:
   ```bash
   ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177
   cd /var/www/dhammasambhava/current
   php artisan db:seed --class=AdminUserSeeder
   ```

## Troubleshooting

**Deployment fails?**
- Check GitHub Actions logs in the "Actions" tab
- Verify all secrets are set correctly
- Make sure SSH key has access to the server

**Can't access the site?**
- Check if server is running: `ssh -i ~/.ssh/id_rsa_personal root@46.62.138.177 'systemctl status nginx'`
- Check server firewall allows HTTP (port 80)

**Need help?**
See the full [DEPLOYMENT.md](DEPLOYMENT.md) guide for detailed instructions.

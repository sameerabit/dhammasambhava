# GitHub Actions Workflows

This directory contains automated workflows for the Dhammasambhava project.

## Workflows

### 1. Tests (`tests.yml`)

**Triggered on:**
- Push to `main` or `develop` branches
- Pull requests to `main` or `develop` branches

**What it does:**
- Sets up PHP 8.4 and Node.js 20
- Installs dependencies (Composer & NPM)
- Builds frontend assets
- Runs database migrations
- Executes PHPUnit tests
- Checks code style with Laravel Pint (optional)

### 2. Deploy (`deploy.yml`)

**Triggered on:**
- Push to `main` branch
- Manual workflow dispatch

**What it does:**
- Sets up SSH connection to Hetzner server
- Installs Ansible
- Runs Ansible playbook to deploy application
- Sends deployment notification

**Required Secrets:**
- `SSH_PRIVATE_KEY` - Private SSH key for server access
- `APP_KEY` - Laravel application key (generate with `php artisan key:generate --show`)
- `ANSIBLE_VAULT_PASSWORD` - Password for Ansible vault (optional)

## Setting Up Secrets

1. Go to your GitHub repository
2. Navigate to: Settings → Secrets and variables → Actions
3. Click "New repository secret"
4. Add each required secret

### SSH_PRIVATE_KEY

```bash
# Display your private key
cat ~/.ssh/id_rsa_personal

# Copy the entire output (including BEGIN and END lines)
```

### APP_KEY

```bash
# Generate a new application key
php artisan key:generate --show

# Copy the output (e.g., base64:xxxxxxxxxxxx)
```

### ANSIBLE_VAULT_PASSWORD

```bash
# Generate a strong password
openssl rand -base64 32

# Save this password securely
```

## Manual Deployment

To trigger a manual deployment:

1. Go to the "Actions" tab in your repository
2. Select "Deploy to Production" workflow
3. Click "Run workflow"
4. Select the branch to deploy
5. Click "Run workflow"

## Monitoring Workflows

- View workflow runs in the "Actions" tab
- Failed workflows will show a red X
- Successful workflows will show a green checkmark
- Click on a workflow run to see detailed logs

## Troubleshooting

### SSH Connection Fails

- Verify `SSH_PRIVATE_KEY` secret is set correctly
- Ensure the key matches the one added to the server
- Check server firewall allows SSH connections

### Deployment Fails

- Check if `APP_KEY` secret is set
- Verify Ansible playbook syntax
- Review detailed error logs in the workflow run

### Tests Fail

- Run tests locally: `php artisan test`
- Check if all dependencies are installed
- Verify database migrations are up to date

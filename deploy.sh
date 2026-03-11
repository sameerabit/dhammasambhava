#!/bin/bash
#
# Manual Deployment Script for Dhammasambhava
# Usage: ./deploy.sh [setup|deploy|rollback]
#

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Change to ansible directory
cd "$(dirname "$0")/ansible"

# Function to print colored messages
print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}→ $1${NC}"
}

# Check if ansible is installed
if ! command -v ansible-playbook &> /dev/null; then
    print_error "Ansible is not installed. Please install it first:"
    echo "  macOS: brew install ansible"
    echo "  Ubuntu: sudo apt install ansible"
    exit 1
fi

# Check if APP_KEY is set
if [ -z "$APP_KEY" ]; then
    print_error "APP_KEY environment variable is not set"
    echo "Generate one with: php artisan key:generate --show"
    exit 1
fi

# Get the action
ACTION=${1:-deploy}

case $ACTION in
    setup)
        print_info "Running initial server setup..."
        ansible-playbook deploy.yml -i inventory.yml --tags setup -e "app_key=$APP_KEY"
        print_success "Server setup completed!"
        ;;

    deploy)
        print_info "Deploying application..."
        ansible-playbook deploy.yml -i inventory.yml --tags deploy -e "app_key=$APP_KEY"
        print_success "Deployment completed!"
        ;;

    config)
        print_info "Updating server configuration..."
        ansible-playbook deploy.yml -i inventory.yml --tags config -e "app_key=$APP_KEY"
        print_success "Configuration updated!"
        ;;

    full)
        print_info "Running full deployment (setup + deploy)..."
        ansible-playbook deploy.yml -i inventory.yml -e "app_key=$APP_KEY"
        print_success "Full deployment completed!"
        ;;

    *)
        print_error "Unknown action: $ACTION"
        echo ""
        echo "Usage: $0 [setup|deploy|config|full]"
        echo ""
        echo "Actions:"
        echo "  setup   - Initial server setup (install packages, configure nginx)"
        echo "  deploy  - Deploy application code (default)"
        echo "  config  - Update server configuration only"
        echo "  full    - Run both setup and deploy"
        echo ""
        echo "Example:"
        echo "  APP_KEY=base64:xxx ./deploy.sh setup"
        echo "  APP_KEY=base64:xxx ./deploy.sh deploy"
        exit 1
        ;;
esac

print_info "Done! Visit http://46.62.138.177 to see your application."

# dhammasambhava

# Software Requirements Specification (SRS)

**Project Name:** Dhamma Sambhava – Dhamma + Yoga Website  
**Prepared for:** Monk / Spiritual Organization  
**Prepared by:** Viraj Amarasinghe  
**Date:** 2026-03-11  

---

## 1. Introduction

### 1.1 Purpose
The website will provide a **platform for people to book Dhamma and Yoga sessions**, access the monk’s teachings, view quotes and images, watch videos, and contact the monk via WhatsApp or other social media.  

The system will allow the monk or admin to **manage content easily** without technical knowledge. The website will be **fast, mobile-friendly, and SEO-optimized**.

### 1.2 Scope
The system will provide:

- Booking system for Dhamma and Yoga sessions  
- Admin dashboard for managing quotes, sessions, images, videos  
- Integration with WhatsApp, YouTube, Facebook  
- Spiritual journey page  
- Photo gallery  
- SEO optimization and analytics  

### 1.3 Audience
- Followers or students of the monk  
- Visitors interested in meditation and yoga  
- Admin / Monk (for content posting and management)  

### 1.4 Definitions / Abbreviations
| Term | Definition |
|------|-----------|
| Dhamma | Teachings of the Buddha |
| Monk | Spiritual teacher managing the site |
| Admin | User managing content and bookings |
| SQLite | Lightweight, file-based database used |
| SEO | Search Engine Optimization |

---

## 2. Overall Description

### 2.1 Product Perspective
The website is a **standalone platform**. It can later be extended into a mobile app or multi-monk platform.

**High-level architecture:**


[User Browser] <--HTTP--> [Laravel + Blade Web App + TailwindCSS] <---> [SQLite Database]
|
+--> Admin Panel (Filament)
+--> YouTube / Facebook API
+--> WhatsApp link integration


### 2.2 Product Functions
1. **Booking System**  
2. **Quotes Management**  
3. **Sessions Management**  
4. **Media Management**  
5. **Spiritual Journey**  
6. **Contact Integration**  
7. **SEO & Analytics**  

---

## 3. Specific Requirements

### 3.1 Functional Requirements
| ID | Requirement | Description |
|----|------------|------------|
| FR1 | Booking system | Users can book sessions; admin sees all bookings |
| FR1.1 | Session capacity check | System prevents booking if max capacity reached |
| FR1.2 | Booking validation | Validate email, WhatsApp format, prevent duplicate bookings on same date/time |
| FR1.3 | Booking calendar | Display available dates/times for each session type |
| FR1.4 | Booking cancellation | Users can request cancellation via email/WhatsApp; admin can cancel bookings |
| FR1.5 | Spam prevention | CAPTCHA on booking form + rate limiting (max 3 bookings per IP per day) |
| FR2 | Admin CRUD | Admin can create, read, update, delete quotes, sessions, media |
| FR3 | Quotes display | Public can view quotes in paginated or daily-random format |
| FR3.1 | Quote of the day | Homepage shows random quote daily (cached) |
| FR4 | Video integration | Embed YouTube videos in teaching section |
| FR5 | WhatsApp link | Floating button links to WhatsApp chat with pre-filled monk number |
| FR6 | Gallery | Show images uploaded by admin in responsive grid layout |
| FR7 | Spiritual journey | Static page with monk biography and teaching philosophy |
| FR8 | Notifications | Optional email confirmation for bookings (visitor + admin) |
| FR9 | SEO | Meta tags, structured data, clean URLs, sitemap, robots.txt |
| FR10 | Analytics | Track page views, session booking clicks, quote interactions |
| FR11 | Responsive design | All pages mobile-optimized (tested on iOS/Android) |
| FR12 | Search functionality | Search quotes by keyword (future enhancement) |

### 3.2 Non-Functional Requirements
| Type | Requirement |
|------|------------|
| Performance | Pages load in <2 seconds on desktop/mobile |
| Scalability | SQLite sufficient for 500–1000 bookings/month; can migrate to MySQL later |
| Usability | Admin panel easy for non-technical users |
| Security | Input validation, spam protection, HTTPS |
| Compatibility | Works on all modern browsers and mobile devices |
| Maintainability | Laravel + Filament for easy future expansion |

### 3.3 Database Requirements
**SQLite database** with the following tables:

- `users` – admin users  
- `bookings` – session bookings  
- `sessions` – available Dhamma/Yoga sessions  
- `quotes` – quotes and teachings  
- `media` – images and video embeds  

### 3.4 UI / UX Requirements
- **Theme:** Calm, ancient manuscript / palm leaf style  
- **Colors:** Sand beige, temple gold, deep green, soft brown  
- **Fonts:** Cinzel, Noto Serif, Cormorant  
- **Navigation:** Simple top menu + floating WhatsApp button  
- **Responsive design:** Mobile-friendly  

### 3.5 Security Requirements
- Use HTTPS  
- Validate all form inputs  
- Optional CAPTCHA for bookings  
- Admin login protected with password hashing  

### 3.6 Accessibility Requirements
- **WCAG 2.1 Level AA Compliance** (minimum)
- **Keyboard Navigation:** All interactive elements accessible via Tab/Enter
- **Screen Reader Support:** Semantic HTML, ARIA labels for images and buttons
- **Color Contrast:** Minimum 4.5:1 ratio for text
- **Alt Text:** All images (quotes, gallery, media) have descriptive alt attributes
- **Form Labels:** All form inputs properly labeled
- **Focus Indicators:** Visible focus states on interactive elements
- **Font Size:** Minimum 16px base font, scalable with browser zoom

### 3.7 SEO Requirements
- Clean URLs: `/quotes/1-mind-is-the-forerunner`
- Meta titles & descriptions for all pages
- OpenGraph for social sharing
- Sitemap (`spatie/laravel-sitemap`)
- Robots.txt for indexing control
- Structured data (JSON-LD) for events, organization, articles

### 3.8 Technology Requirements
| Layer | Technology |
|-------|------------|
| Backend | Laravel 11.x + PHP 8.2+ |
| Database | SQLite 3 |
| Frontend | Blade + TailwindCSS 3.x + Alpine.js 3.x |
| Admin Panel | Filament 3.x |
| Authentication | Laravel Breeze (simple admin auth) |
| Email Service | Mailtrap (dev) / Mailgun or SendGrid (prod) |
| Media Hosting | YouTube / Local storage (with Laravel Media Library) |
| Social Integration | WhatsApp Business Link, Facebook Page Plugin |
| SEO | spatie/laravel-sitemap, artesaos/seotools |

### 3.9 Deployment Requirements

**Minimum Server Requirements:**
- PHP 8.2 or higher
- Composer 2.x
- SQLite 3.35+
- Nginx or Apache with mod_rewrite
- SSL certificate (Let's Encrypt recommended)
- Minimum 512MB RAM, 1GB recommended
- 5GB disk space (expandable for media storage)

**Recommended Hosting Options:**
1. **VPS** (DigitalOcean, Linode, Vultr) – Full control, scalable
2. **Laravel Forge** – Automated deployment, server management
3. **Shared Hosting** (with PHP 8.2+ support) – Budget option, limited scalability

**Production Environment Setup:**
- Domain with DNS configured (e.g., `dhammasambhava.org`)
- SSL certificate installed and auto-renewal enabled
- File permissions: `storage/` and `bootstrap/cache/` writable by web server
- `.env` file configured with production settings
- `APP_ENV=production`, `APP_DEBUG=false`
- Cron job for Laravel scheduler (if needed for future features)  

---

## 4. Use Cases

### 4.1 Booking a Session
**Actor:** Website visitor
**Precondition:** Session is active and not at capacity
**Flow:**
1. Visitor browses available sessions on booking page
2. Selects desired session (Dhamma/Yoga)
3. Chooses date and time from available slots
4. Fills booking form: name, email, WhatsApp number, optional notes
5. Submits form (with CAPTCHA if enabled)
6. System validates input and checks capacity
7. Booking created with "pending" status
8. Visitor sees confirmation message with booking details
9. Optional: Confirmation email sent to visitor
10. Admin receives notification of new booking

**Postcondition:** Booking record created in database, visitor can cancel via email/WhatsApp

### 4.2 Admin Adds a Quote
**Actor:** Admin / Monk
**Precondition:** Admin is logged in
**Flow:**
1. Admin navigates to Filament admin panel → Quotes section
2. Clicks "Create Quote"
3. Enters quote text
4. Optionally uploads background image (palm leaf, lotus, etc.)
5. Sets author name (defaults to monk's name)
6. Toggles "Published" status
7. Saves quote
8. Quote appears on public quotes page (if published)

**Postcondition:** Quote visible to public visitors

### 4.3 Admin Adds Session
**Actor:** Admin
**Precondition:** Admin is logged in
**Flow:**
1. Admin navigates to Sessions section in admin panel
2. Clicks "Create Session"
3. Fills session details: title, type (Dhamma/Yoga/Both), duration, price
4. Sets max capacity (or leaves unlimited)
5. Adds description and location
6. Uploads session image
7. Marks as active
8. Saves session
9. Session appears on booking page

**Postcondition:** Session available for public booking

### 4.4 Visitor Views Quotes
**Actor:** Website visitor
**Flow:**
1. Visitor navigates to Quotes page
2. Sees paginated list of published quotes (or daily random quote on homepage)
3. Clicks to view full quote with image
4. Can share quote on social media (OpenGraph integration)

**Postcondition:** Quote view tracked in analytics

### 4.5 Visitor Watches Teaching Video
**Actor:** Website visitor
**Flow:**
1. Visitor navigates to Teachings/Videos page
2. Browses list of embedded YouTube videos
3. Clicks video to watch inline
4. Video plays via YouTube embed

**Postcondition:** Video view tracked

### 4.6 Admin Manages Bookings
**Actor:** Admin
**Precondition:** Bookings exist in system
**Flow:**
1. Admin logs into Filament panel
2. Navigates to Bookings section
3. Sees table with all bookings (pending/confirmed/cancelled)
4. Filters by date, session, or status
5. Clicks booking to view details
6. Updates status (confirm or cancel)
7. Optionally contacts visitor via WhatsApp link

**Postcondition:** Booking status updated

### 4.7 Visitor Contacts via WhatsApp
**Actor:** Website visitor
**Flow:**
1. Visitor sees floating WhatsApp button on any page
2. Clicks button
3. Redirected to WhatsApp chat with monk's number pre-populated
4. Can send message directly

**Postcondition:** Visitor connected to WhatsApp

### 4.8 Admin Uploads Gallery Images
**Actor:** Admin
**Precondition:** Admin is logged in
**Flow:**
1. Admin navigates to Media → Gallery section
2. Clicks "Upload Images"
3. Selects multiple images (events, ceremonies, nature photos)
4. Adds titles and descriptions
5. Sets display order
6. Publishes images
7. Images appear in public gallery page

**Postcondition:** Gallery updated with new images

---

## 5. Assumptions and Dependencies
- Users have internet access  
- YouTube is used for video hosting  
- WhatsApp link works for visitor’s device  
- SQLite sufficient for initial traffic  
- Admin can manage content without coding knowledge  

---

## 6. Future Enhancements
- Online payment for donations
- Zoom integration for online sessions
- Newsletter / email subscriptions
- Mobile app version
- Multi-monk platform

---

## 7. Database Schema

### 7.1 Entity Relationship Diagram (ERD)

**Tables and Relationships:**

#### `users`
| Column | Type | Description |
|--------|------|-------------|
| id | INTEGER PRIMARY KEY | Auto-increment user ID |
| name | VARCHAR(255) | Admin name |
| email | VARCHAR(255) UNIQUE | Admin email |
| password | VARCHAR(255) | Hashed password |
| role | ENUM('admin','super_admin') | User role |
| created_at | TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | Last update time |

#### `sessions`
| Column | Type | Description |
|--------|------|-------------|
| id | INTEGER PRIMARY KEY | Auto-increment session ID |
| title | VARCHAR(255) | Session title (e.g., "Morning Meditation") |
| type | ENUM('dhamma','yoga','both') | Session type |
| description | TEXT | Detailed description |
| duration | INTEGER | Duration in minutes |
| price | DECIMAL(8,2) | Price (0 for free) |
| max_capacity | INTEGER | Maximum participants (NULL = unlimited) |
| location | VARCHAR(255) | Physical or online location |
| is_active | BOOLEAN | Whether session is bookable |
| image_path | VARCHAR(255) | Optional session image |
| created_at | TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | Last update time |

#### `bookings`
| Column | Type | Description |
|--------|------|-------------|
| id | INTEGER PRIMARY KEY | Auto-increment booking ID |
| session_id | INTEGER | Foreign key to sessions |
| name | VARCHAR(255) | Visitor name |
| email | VARCHAR(255) | Visitor email |
| whatsapp | VARCHAR(20) | WhatsApp number with country code |
| booking_date | DATE | Requested session date |
| booking_time | TIME | Requested session time |
| status | ENUM('pending','confirmed','cancelled') | Booking status |
| notes | TEXT | Optional visitor notes |
| ip_address | VARCHAR(45) | For spam tracking |
| created_at | TIMESTAMP | Booking creation time |
| updated_at | TIMESTAMP | Last update time |

**Indexes:**
- `bookings.session_id` (foreign key)
- `bookings.booking_date` (for calendar queries)
- `bookings.status` (for filtering)

#### `quotes`
| Column | Type | Description |
|--------|------|-------------|
| id | INTEGER PRIMARY KEY | Auto-increment quote ID |
| text | TEXT | Quote content |
| author | VARCHAR(255) | Quote author (default: monk's name) |
| image_path | VARCHAR(255) | Optional background image |
| is_published | BOOLEAN | Published status |
| display_order | INTEGER | Manual ordering (optional) |
| created_at | TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | Last update time |

#### `media`
| Column | Type | Description |
|--------|------|-------------|
| id | INTEGER PRIMARY KEY | Auto-increment media ID |
| type | ENUM('image','video','youtube') | Media type |
| title | VARCHAR(255) | Media title |
| description | TEXT | Optional description |
| file_path | VARCHAR(255) | Local file path (for images) |
| youtube_url | VARCHAR(255) | YouTube video URL/ID |
| category | VARCHAR(100) | Category (gallery, teaching, etc.) |
| is_published | BOOLEAN | Published status |
| display_order | INTEGER | Manual ordering |
| created_at | TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | Last update time |

### 7.2 Database Relationships
- `bookings.session_id` → `sessions.id` (Many-to-One)
- Future: Add `session_schedules` table for recurring sessions with availability

---

## 8. Testing Requirements

### 8.1 Testing Strategy
| Test Type | Coverage | Tools |
|-----------|----------|-------|
| Unit Tests | Models, Services | PHPUnit |
| Feature Tests | Routes, Controllers, Forms | PHPUnit + Laravel HTTP Tests |
| Browser Tests | User flows, Booking process | Laravel Dusk (optional) |
| Manual Testing | Admin panel, UI/UX | QA Checklist |

### 8.2 Test Cases

#### Critical Test Cases
| ID | Test Case | Expected Result |
|----|-----------|-----------------|
| TC1 | User submits booking with valid data | Booking created, confirmation shown |
| TC2 | User submits booking with invalid email | Validation error shown |
| TC3 | Booking submitted when session at capacity | Error: "Session full" |
| TC4 | Admin creates quote without image | Quote saved successfully |
| TC5 | Admin uploads invalid file type | Validation error shown |
| TC6 | Unauthenticated user accesses admin panel | Redirected to login |
| TC7 | SQL injection attempt in booking form | Input sanitized, no DB compromise |
| TC8 | XSS attempt in quote text | HTML escaped, no script execution |

### 8.3 CI/CD Testing
- All tests must pass before deployment
- Minimum 70% code coverage for business logic
- Database migrations tested on fresh SQLite instance

---

## 9. Backup & Recovery Strategy

### 9.1 Backup Requirements
| Asset | Frequency | Retention | Method |
|-------|-----------|-----------|--------|
| SQLite database | Daily (automated) | 30 days | File copy to cloud storage |
| Uploaded media files | Daily | 90 days | rsync to backup server |
| `.env` configuration | On change | Encrypted backup | Manual secure storage |
| Full application code | On deploy | Via Git | GitHub repository |

### 9.2 Backup Automation
**Daily Backup Script (cron):**
```bash
#!/bin/bash
# /usr/local/bin/backup-dhammasambhava.sh
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/dhammasambhava"
cp /var/www/dhammasambhava/database/database.sqlite $BACKUP_DIR/db_backup_$DATE.sqlite
tar -czf $BACKUP_DIR/media_backup_$DATE.tar.gz /var/www/dhammasambhava/storage/app/public
# Upload to cloud storage (S3, Google Drive, etc.)
# rclone copy $BACKUP_DIR remote:dhammasambhava-backups/
# Delete backups older than 30 days
find $BACKUP_DIR -name "*.sqlite" -mtime +30 -delete
```

### 9.3 Recovery Procedures
1. **Database Corruption:** Restore latest `.sqlite` backup, replay recent transactions if logged
2. **File Loss:** Restore from daily media backup
3. **Full Site Failure:** Redeploy from Git + restore database + restore media files
4. **Recovery Time Objective (RTO):** < 2 hours
5. **Recovery Point Objective (RPO):** < 24 hours (daily backups)

---

## 10. API Requirements

### 10.1 API Strategy
**Initial Version:** Server-side rendering only (Blade templates)

**Future API Endpoints (if mobile app needed):**
- `GET /api/sessions` – List available sessions
- `POST /api/bookings` – Create booking
- `GET /api/quotes` – Fetch quotes (paginated)
- `GET /api/media` – Fetch gallery images/videos

### 10.2 API Authentication (Future)
- Laravel Sanctum for token-based auth
- Rate limiting: 60 requests/minute per IP

---

## 11. Monitoring & Logging

### 11.1 Application Monitoring
| Metric | Tool | Alert Threshold |
|--------|------|-----------------|
| Uptime | UptimeRobot / Pingdom | < 99% monthly |
| Response time | Laravel Telescope (dev) | > 3 seconds |
| Error rate | Log monitoring | > 5 errors/hour |
| Disk space (SQLite) | Server monitoring | > 80% full |

### 11.2 Logging Requirements
- **Laravel Log Channels:** Daily log rotation, 14-day retention
- **Logged Events:**
  - Booking submissions (with IP for spam tracking)
  - Admin login attempts (successful & failed)
  - File uploads
  - Email send failures
  - Database errors

### 11.3 Analytics
- **Google Analytics 4:** Page views, booking button clicks, quote interactions
- **Admin Dashboard:** Total bookings, popular sessions, quote views

---

## 12. Privacy & Compliance

### 12.1 Data Privacy
- **User Data Collected:** Name, email, WhatsApp number (booking only)
- **Data Retention:** Booking data kept for 1 year, then archived
- **Cookie Policy:** Analytics cookies (Google Analytics) with consent banner
- **Privacy Policy Page:** Required (template available)

### 12.2 GDPR Compliance (if EU visitors expected)
- Right to access data (admin can export bookings)
- Right to deletion (admin can delete user bookings)
- Cookie consent banner (use package like `cookie-consent`)

### 12.3 Security Compliance
- HTTPS enforced (SSL certificate via Let's Encrypt)
- Password hashing (bcrypt via Laravel)
- CSRF protection on all forms
- SQL injection prevention (Eloquent ORM)
- XSS prevention (Blade auto-escaping)

---

## 13. DevOps & Deployment Requirements

### 13.1 Version Control
- GitHub repository for all source code  
- Branching strategy: `main`, `develop`, `feature/*`  

### 13.2 GitHub Actions Workflow (CI/CD)

**Workflow file:** `.github/workflows/deploy.yml`

**Trigger:** Push to `main` branch

**Steps:**
1. Checkout code
2. Setup PHP 8.2+ with extensions: `mbstring`, `pdo_sqlite`, `sqlite3`, `curl`, `xml`, `zip`
3. Copy `.env.testing` for CI environment
4. Install Composer dependencies (`composer install --no-dev --optimize-autoloader`)
5. Generate application key (`php artisan key:generate`)
6. Create SQLite database for tests (`touch database/database.sqlite`)
7. Run database migrations (`php artisan migrate --force`)
8. Run PHPUnit tests (`php artisan test`)
9. If tests pass → Deploy to VPS via SSH/SCP
10. SSH into VPS and run:
    - `git pull origin main`
    - `composer install --no-dev --optimize-autoloader`
    - `php artisan migrate --force`
    - `php artisan config:cache`
    - `php artisan route:cache`
    - `php artisan view:cache`
    - `php artisan storage:link` (if not already linked)
11. Restart PHP-FPM service (`sudo systemctl restart php8.2-fpm`)

**GitHub Secrets Required:**
- `VPS_HOST` – VPS IP address or domain
- `VPS_USER` – SSH username
- `VPS_SSH_KEY` – Private SSH key for authentication
- `VPS_PATH` – Application path on VPS (e.g., `/var/www/dhammasambhava`)

**Rollback Strategy:** Keep previous release in `/var/www/dhammasambhava-previous` for quick rollback  

### 13.3 Ansible Deployment Setup
Tasks:

1. Install system dependencies (PHP, Composer, Nginx/Apache, Node.js optional)  
2. Configure web server (virtual host + HTTPS)  
3. Setup Laravel environment (`.env` + `database.sqlite`)  
4. Deploy code from GitHub  
5. Run migrations and cache commands  
6. Optional: supervisor, cron jobs  

**Ansible folder structure example:**


ansible/
├── hosts.yml
├── playbook.yml
├── roles/
│ ├── php/
│ ├── nginx/
│ ├── laravel/
│ └── deploy/
└── vars/
└── main.yml


### 13.4 Deployment Flow Summary
1. Developer pushes code to `feature/*` → `develop` branch  
2. Code reviewed → merged into `main`  
3. GitHub Actions runs CI tests → deploys to VPS  
4. Ansible ensures server has latest environment setup and correct permissions  
5. Website live at `https://dhammasambhava.org`  

---

**End of SRS**
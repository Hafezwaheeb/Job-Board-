# Job Board - Laravel Blog Platform

A modern, full-featured blog platform built with Laravel 11, featuring user authentication, post management, comments, and a beautiful responsive UI.

## Features

- 🔐 **User Authentication** - Login, signup, and JWT-based authentication
- 📝 **Blog Management** - Create, read, update, and delete posts
- 💬 **Comments System** - Users can comment on posts
- 👥 **Role-Based Access** - Admin, Editor, and User roles
- 🎨 **Modern UI** - Beautiful, responsive design with smooth animations
- 🏷️ **Tagging System** - Organize posts with tags
- 📱 **Fully Responsive** - Works seamlessly on all devices

## Tech Stack

- **Backend**: Laravel 11
- **Database**: SQLite (configurable to MySQL/PostgreSQL)
- **Authentication**: JWT (tymon/jwt-auth)
- **Frontend**: Blade Templates with Custom CSS
- **PHP**: 8.2+

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM (optional, for asset compilation)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd job-board
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   copy .env.example .env
   php artisan key:generate
   php artisan jwt:secret
   ```

4. **Configure database**
   - Edit `.env` file and set your database credentials
   - For SQLite (default):
     ```
     DB_CONNECTION=sqlite
     DB_DATABASE=database/database.sqlite
     ```

5. **Create database file** (if using SQLite)
   ```bash
   type nul > database\database.sqlite
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed database** (optional)
   ```bash
   php artisan db:seed
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

9. **Visit** `http://localhost:8000`

## Default Users

After seeding, you can login with:

- **Admin**: admin@example.com / password
- **Editor**: editor@example.com / password
- **User**: user@example.com / password

## Project Structure

```
job-board/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/              # Eloquent models
│   ├── Services/            # Business logic services
│   └── Repositories/        # Data access layer
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/             # Database seeders
│   └── factories/           # Model factories
├── resources/
│   ├── views/               # Blade templates
│   └── css/                 # Custom stylesheets
├── routes/
│   ├── web.php              # Web routes
│   └── api.php              # API routes
└── public/
    └── css/                 # Compiled CSS
```

## Key Features Explained

### Authentication System
- JWT-based authentication for API endpoints
- Session-based authentication for web routes
- Role-based authorization (Admin, Editor, User)

### Blog System
- Full CRUD operations for posts
- Rich text content support
- Author attribution
- Published/Draft status

### Comments System
- Nested comments support
- Author information
- Timestamps

### UI/UX
- Modern gradient designs
- Smooth animations and transitions
- Responsive navigation with dropdown
- Card-based layouts
- Glass morphism effects

## API Endpoints

### Authentication
- `POST /api/login` - User login
- `POST /api/register` - User registration
- `POST /api/logout` - User logout

### Posts
- `GET /api/posts` - List all posts
- `GET /api/posts/{id}` - Get single post
- `POST /api/posts` - Create post (Admin/Editor)
- `PUT /api/posts/{id}` - Update post (Admin/Editor)
- `DELETE /api/posts/{id}` - Delete post (Admin)

### Comments
- `GET /api/posts/{id}/comments` - Get post comments
- `POST /api/comments` - Create comment
- `DELETE /api/comments/{id}` - Delete comment

## Configuration

### Database
Edit `.env` to configure your database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_board
DB_USERNAME=root
DB_PASSWORD=
```

### JWT Configuration
```env
JWT_SECRET=your-secret-key
JWT_TTL=60
```

## Development

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Troubleshooting

### Migration Issues
```bash
php artisan migrate:fresh --seed
```

### Permission Issues
```bash
chmod -R 775 storage bootstrap/cache
```

### JWT Secret Missing
```bash
php artisan jwt:secret
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support, email support@jobboard.com or open an issue in the repository.

## Acknowledgments

- Laravel Framework
- Tailwind CSS inspiration
- Inter Font Family
- JWT Auth Package

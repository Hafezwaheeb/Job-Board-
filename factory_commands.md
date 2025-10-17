# Laravel Factory Commands

## Creating Factories
```bash
# Create a factory for existing model
php artisan make:factory CommentFactory

# Create factory for specific model
php artisan make:factory CommentFactory --model=Comment
```

## Using Factories in Tinker
```bash
# Start Laravel's interactive shell
php artisan tinker

# Create single record
>>> Post::factory()->create()

# Create multiple records
>>> Post::factory()->count(5)->create()

# Use factory states
>>> Post::factory()->published()->count(3)->create()

# Create with custom attributes
>>> Post::factory()->create(['title' => 'My Title'])

# Create relationships
>>> Post::factory()->has(Comment::factory()->count(3))->create()
```

## Database Seeding
```bash
# Run all seeders
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=PostSeeder

# Fresh migration with seeding
php artisan migrate:fresh --seed
```

## Testing Commands
```bash
# Run tests (factories used automatically)
php artisan test

# Run specific test
php artisan test --filter=test_post_creation
```
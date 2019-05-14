<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use App\Repositories\BookCopyRepository;
use App\Repositories\BookHistoryRepository;
use App\Repositories\BookImageRepository;
use App\Repositories\BookQuantityRepository;
use App\Repositories\BookRepository;
use App\Repositories\CardRepository;
use App\Repositories\Eloquent\EloquentAuthorRepository;
use App\Repositories\Eloquent\EloquentBookCopyRepository;
use App\Repositories\Eloquent\EloquentBookHistoryRepository;
use App\Repositories\Eloquent\EloquentBookImageRepository;
use App\Repositories\Eloquent\EloquentBookQuantityRepository;
use App\Repositories\Eloquent\EloquentBookRepository;
use App\Repositories\Eloquent\EloquentCardRepository;
use App\Repositories\Eloquent\EloquentGenreRepository;
use App\Repositories\Eloquent\EloquentImageRepository;
use App\Repositories\Eloquent\EloquentPublisherRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Repositories\GenreRepository;
use App\Repositories\ImageRepository;
use App\Repositories\PublisherRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\AuthorService;
use App\Services\BookCopyService;
use App\Services\BookHistoryService;
use App\Services\BookImageService;
use App\Services\BookQuantityService;
use App\Services\BookService;
use App\Services\CardService;
use App\Services\Eloquent\EloquentAuthorService;
use App\Services\Eloquent\EloquentBookCopyService;
use App\Services\Eloquent\EloquentBookHistoryService;
use App\Services\Eloquent\EloquentBookImageService;
use App\Services\Eloquent\EloquentBookQuantityService;
use App\Services\Eloquent\EloquentBookService;
use App\Services\Eloquent\EloquentCardService;
use App\Services\Eloquent\EloquentGenreService;
use App\Services\Eloquent\EloquentImageService;
use App\Services\Eloquent\EloquentPublisherService;
use App\Services\Eloquent\EloquentRoleService;
use App\Services\Eloquent\EloquentService;
use App\Services\Eloquent\EloquentUserService;
use App\Services\GenreService;
use App\Services\ImageService;
use App\Services\PublisherService;
use App\Services\RoleService;
use App\Services\Service;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use PhpOption\Tests\Repository;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //services
        $this->app->singleton(Service::class, EloquentService::class);
        $this->app->singleton(AuthorService::class, EloquentAuthorService::class);
        $this->app->singleton(BookCopyService::class, EloquentBookCopyService::class);
        $this->app->singleton(BookHistoryService::class, EloquentBookHistoryService::class);
        $this->app->singleton(BookImageService::class, EloquentBookImageService::class);
        $this->app->singleton(BookService::class, EloquentBookService::class);
        $this->app->singleton(GenreService::class, EloquentGenreService::class);
        $this->app->singleton(ImageService::class, EloquentImageService::class);
        $this->app->singleton(PublisherService::class, EloquentPublisherService::class);
        $this->app->singleton(RoleService::class, EloquentRoleService::class);
        $this->app->singleton(UserService::class, EloquentUserService::class);
        $this->app->singleton(BookQuantityService::class, EloquentBookQuantityService::class);
        $this->app->singleton(CardService::class, EloquentCardService::class);

        //repositories
        $this->app->singleton(Repository::class, EloquentRepository::class);
        $this->app->singleton(AuthorRepository::class, EloquentAuthorRepository::class);
        $this->app->singleton(BookCopyRepository::class, EloquentBookCopyRepository::class);
        $this->app->singleton(BookHistoryRepository::class, EloquentBookHistoryRepository::class);
        $this->app->singleton(BookImageRepository::class, EloquentBookImageRepository::class);
        $this->app->singleton(BookRepository::class, EloquentBookRepository::class);
        $this->app->singleton(GenreRepository::class, EloquentGenreRepository::class);
        $this->app->singleton(ImageRepository::class, EloquentImageRepository::class);
        $this->app->singleton(PublisherRepository::class, EloquentPublisherRepository::class);
        $this->app->singleton(RoleRepository::class, EloquentRoleRepository::class);
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(BookQuantityRepository::class, EloquentBookQuantityRepository::class);
        $this->app->singleton(CardRepository::class, EloquentCardRepository::class);


//        $author['listAuthor'] = Author::all();
//        $genre['listGenre'] = Genre::all();
//        $publisher['listPublisher'] = Publisher::all();
//
//        View::share($author);
//        View::share($genre);
//        View::share($publisher);

    }
}

Nguyễn Tiến Đạt

Deha-Academy-php-RestfullApi-Lab

Getting Started
`git clone ` 

php artisan serv
Tools/commands used
Create Migration:
php artisan make:migration create_posts_table
php artisan make:migrate
Tạo Model và Controller:
php artisan make:model Post
php artisan make:controller API/PostController --api
Install Api
php artisan install:api
Create Factory and Seed dữ liệu mẫu
php artisan make:factory PostFactory
php artisan tinker
App\Models\Post::factory(100)->create()
Create Resource and Collection
php artisan make:resource PostResource
php artisan make:resource PostCollection
Create Form Request Validation
php artisan make:request StorePostRequest
php artisan make:request UpdatePostRequest
Using Postman to test API
Get list Post

image

Add Post

image

Update Post by PUT

image

Update Post by PATCH

image

Get Post

image

Delete Post

image

Feature Test
Create test
php artisan make:test Posts/CreatePostTest
php artisan make:test Posts/DeletePostTest
php artisan make:test Posts/GetListPostTest
php artisan make:test Posts/GetPostTest
php artisan make:test Posts/UpdatePostTest
Run test
CreatePostTest

php artisan test --filter user_can_create_post_if_data_is_valid
php artisan test --filter user_can_not_create_post_if_name_is_null
php artisan test --filter user_can_not_create_post_if_body_is_null
php artisan test --filter user_can_not_create_post_if_data_is_invalid
DeletePostTest

php artisan test --filter user_can_delete_post_if_post_exits
php artisan test --filter user_can_not_delete_post_if_post_not_exits
GetListPostTest

php artisan test --filter user_can_get_list_posts
GetPostTest

php artisan test --filter user_can_not_get_post_if_post_not_exits
php artisan test --filter user_can_get_post_if_post_exits
UpdatePostTest

php artisan test --filter user_can_update_post_if_post_exits_and_data_is_valid
php artisan test --filter user_can_not_update_post_if_post_exits_and_name_is_null
php artisan test --filter user_can_not_update_post_if_post_exits_and_body_is_null
php artisan test --filter user_can_not_update_post_if_post_exits_and_data_is_not_valid
php artisan test --filter user_can_not_update_post_if_post_not_exits_and_data_is_valid

Use handle error (Handler.app)
public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' =>  $e->getMessage()
            ],Response::HTTP_NOT_FOUND);
                }
        // Xử lý lỗi NotFoundHttpException (404 - Trang không tìm thấy)
        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Trang không tìm thấy!'
            ], Response::HTTP_NOT_FOUND);
        }

        // Nếu không phải các lỗi trên, trả về lỗi mặc định
        return parent::render($request, $e);
    }
}

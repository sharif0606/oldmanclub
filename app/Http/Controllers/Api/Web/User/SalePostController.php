<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\SalePost;
use App\Http\Helpers\SanitizationHelper;
use App\Services\FileUploadService;
use App\Services\UrlConversionService;
use App\Models\User\SalePostFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Tag;
use App\Models\SalePostTag;
use App\Models\SalePostCategory;
class SalePostController extends BaseController
{
    protected $fileUploadService;
    protected $urlConversionService;
    public function __construct(FileUploadService $fileUploadService, UrlConversionService $urlConversionService)
    {
        $this->fileUploadService = $fileUploadService;
        $this->urlConversionService = $urlConversionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,$limit = 20)
    {
        $post = SalePost::with('files','category','tags','country','state','city');
        if($request->has('search') && $request->search != ''){
            $post->where('message','like','%'.$request->search.'%');
        }
        $post = $post->orderBy('created_at', 'desc')->paginate($limit);
        return $this->sendResponse($post, 'Sale posts fetched successfully');
    }

    public function getSalePostCategory()
    {
        $data = SalePostCategory::all();
        return $this->sendResponse($data, 'Sale post categories fetched successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'photos' => 'required|array',
            'photos.*' => 'required|image|max:10240',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:sale_post_categories,id',
            'condition' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }
        $description = $this->urlConversionService->processTextContent($request->input('description'));
        $title = $this->urlConversionService->processTextContent($request->input('title'));
        $price = SanitizationHelper::sanitizeFloat($request->input('price'));
        $category_id = SanitizationHelper::sanitizeInteger($request->input('category_id'));
        $condition = SanitizationHelper::sanitizeInteger($request->input('condition'));
        $availability = SanitizationHelper::sanitizeInteger($request->input('availability'));
        $sku = SanitizationHelper::sanitizeString($request->input('sku'));
        $country_id = SanitizationHelper::sanitizeInteger($request->input('country_id'));
        $state_id = SanitizationHelper::sanitizeInteger($request->input('state_id'));
        $city_id = SanitizationHelper::sanitizeInteger($request->input('city_id'));
        $public_meetup = SanitizationHelper::sanitizeInteger($request->input('public_meetup'));
        $door_pickup = SanitizationHelper::sanitizeInteger($request->input('door_pickup'));
        $door_dropoff = SanitizationHelper::sanitizeInteger($request->input('door_dropoff'));
        $hide_from_friends = SanitizationHelper::sanitizeInteger($request->input('hide_from_friends'));
        $status = SanitizationHelper::sanitizeInteger($request->input('status'));
        $published_at = SanitizationHelper::sanitizeDate($request->input('published_at'));
        $unpublished_at = SanitizationHelper::sanitizeDate($request->input('unpublished_at'));
       
        $salePost = SalePost::create(
            [
                'client_id' => currentUserId(),
                'title' => $title,
                'price' => $price,
                'category_id' => $category_id,
                'condition' => $condition,
                'description' => $description,
                'availability' => $availability,
                'sku' => $sku,
                'country_id' => $country_id,
                'state_id' => $state_id,
                'city_id' => $city_id,
                'public_meetup' => $public_meetup,
                'door_pickup' => $door_pickup,
                'door_dropoff' => $door_dropoff,
                'hide_from_friends' => $hide_from_friends,
                'status' => $status,
                'published_at' => $published_at,
                'unpublished_at' => $unpublished_at
            ]
        );

        if($salePost && $request->hasFile('files')) {
            $files = $request->file('files');
            
            foreach ($files as $file) {
                try {
                    $this->fileUploadService->uploadSalePostFile($file, $salePost->id);
                } catch (\Exception $e) {
                    // Log error and continue with other files
                    \Log::error('File upload failed: ' . $e->getMessage());
                }
            }
        }

        if($salePost && $request->has('tags')){
            $tags = SanitizationHelper::sanitizeString($request->input('tags'));
            $tags = explode(',', $tags);
            foreach($tags as $tag){
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $salePostTag = SalePostTag::create([
                    'sale_post_id' => $salePost->id,
                    'tag_id' => $tag->id
                ]);
            }
        }
        return $this->sendResponse($salePost, 'Sale post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalePost $salePost)
    {
        $salePost = $salePost->load('files','category','tags','country','state','city');
        return $this->sendResponse($salePost, 'Sale post fetched successfully');
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $salePost = SalePost::where('client_id', currentUserId())->find($id);
        if(!$salePost){
            return $this->sendError('Sale post not found');
        }
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'photos' => 'required|array',
            'photos.*' => 'required|image|max:10240',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:sale_post_categories,id',
            'condition' => 'required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }
        $description = $this->urlConversionService->processTextContent($request->input('description'));
        $title = $this->urlConversionService->processTextContent($request->input('title'));
        $price = SanitizationHelper::sanitizeFloat($request->input('price'));
        $category_id = SanitizationHelper::sanitizeInteger($request->input('category_id'));
        $condition = SanitizationHelper::sanitizeInteger($request->input('condition'));
        $availability = SanitizationHelper::sanitizeInteger($request->input('availability'));
        $sku = SanitizationHelper::sanitizeString($request->input('sku'));
        $country_id = SanitizationHelper::sanitizeInteger($request->input('country_id'));
        $state_id = SanitizationHelper::sanitizeInteger($request->input('state_id'));
        $city_id = SanitizationHelper::sanitizeInteger($request->input('city_id'));
        $public_meetup = SanitizationHelper::sanitizeInteger($request->input('public_meetup'));
        $door_pickup = SanitizationHelper::sanitizeInteger($request->input('door_pickup'));
        $door_dropoff = SanitizationHelper::sanitizeInteger($request->input('door_dropoff'));
        $hide_from_friends = SanitizationHelper::sanitizeInteger($request->input('hide_from_friends'));
        $status = SanitizationHelper::sanitizeInteger($request->input('status'));
        $published_at = SanitizationHelper::sanitizeDate($request->input('published_at'));
        $unpublished_at = SanitizationHelper::sanitizeDate($request->input('unpublished_at'));
        
        $salePost->update([
            'title' => $title,
            'price' => $price,
            'category_id' => $category_id,
            'condition' => $condition,
            'description' => $description,
            'availability' => $availability,
            'sku' => $sku,
            'country_id' => $country_id,
            'state_id' => $state_id,
            'city_id' => $city_id,
            'public_meetup' => $public_meetup,
            'door_pickup' => $door_pickup,
            'door_dropoff' => $door_dropoff,
            'hide_from_friends' => $hide_from_friends,
            'status' => $status,
            'published_at' => $published_at,
            'unpublished_at' => $unpublished_at
        ]);

        if($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file){
                try {
                    $this->fileUploadService->uploadSalePostFile($file, $salePost->id);
                } catch (\Exception $e) {
                    // Log error and continue with other files
                    \Log::error('File upload failed: ' . $e->getMessage());
                }
            }
        }

        if($request->has('tags')){
            $tags = SanitizationHelper::sanitizeString($request->input('tags'));
            $tags = explode(',', $tags);
            foreach($tags as $tag){
                $tag = Tag::firstOrCreate(['name' => $tag]);
                $salePostTag = SalePostTag::create([
                    'sale_post_id' => $salePost->id,
                    'tag_id' => $tag->id
                ]);
            }
        }
        return $this->sendResponse($salePost, 'Sale post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salePost = SalePost::where('client_id', currentUserId())->find($id);
        if(!$salePost){
            return $this->sendError('Sale post not found');
        }
        if($salePost->delete()){
            $files = SalePostFile::where('sale_post_id', $id)->get();
            foreach($files as $file){
                $this->fileUploadService->deleteFile('sale_post', $file->file_path);
                $file->delete();
            }
            return $this->sendResponse(null, 'Sale post deleted successfully');
        }
        return $this->sendError('Sale post not deleted');
    }
}

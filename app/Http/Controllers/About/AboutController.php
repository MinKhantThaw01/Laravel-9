<?php

namespace App\Http\Controllers\About;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function AboutPage(){
        $aboutData= About::find(1);
        return view('admin.aboutPage.about_page_all',compact('aboutData'));
    }

      public function UpdateAbout(Request $request){

            $id = $request->id;

            if($request->file('about_image')){
                $about_img = $request->file('about_image');
                $img_path = hexdec(uniqid()).'.'.$about_img->getClientOriginalExtension();

                Image::make($about_img)->resize(523,605)->save('/upload/aboutPage/'.$img_path);

                $original_name = "/upload/aboutPage/".$img_path;

                About::findOrFail($id)->update([
                    'title'=> $request->title,
                    'short_title'=> $request->short_title,
                    'short_description'=> $request->short_description,
                    'long_description'=> $request->long_description,
                    'about_image'=> $original_name,
                ]);

                $notifications = array(
                    'message'=>'Updated About Page With Image Successfully',
                    'alert-type'=> 'success'
                );

                return redirect()->back()->with($notifications);
            }else
            {

                About::findOrFail($id)->update([
                    'title'=> $request->title,
                    'short_title'=> $request->short_title,
                    'short_description'=> $request->short_description,
                    'long_description'=> $request->long_description,
                ]);


                $notifications = array(
                    'message'=>'Updated About Page Without Image Successfully',
                    'alert-type'=> 'info'
                );

                return redirect()->back()->with($notifications);
            }
        }

        public function HomeAbout(){

            $aboutData= About::find(1);

            return view('fronted.about',compact('aboutData'));
                
        }

        public function MultiImage(){
                return view('admin.AboutPage.multi_image');
            }


        public function StoreMultiImage(Request $request){
                
            $images = $request->file('multi_image');

            foreach($images as $image){


                
                $slider_path = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();

                Image::make($image)->resize(220,220)->save('upload/Multi/'.$slider_path);

                $save_url = 'upload/Multi/'.$slider_path;

                MultiImage::insert([
                    'multi_image'=> $save_url,
                    'created_at'=> Carbon::now()
                ]);
               
            }
            $notification = array(
                'message' => 'Home Slider Updated With Image Successfully', 
                'alert-type' => 'success'
            );
            return redirect(route('all.multi.image'))->with($notification);
        }

        public function AllMultiImage(){
                $multi_image = MultiImage::all();

                return view('admin.aboutPage.all_multi_image',compact('multi_image'));
        }
        
        public function EditMultiImage($id){

            $multiImage = MultiImage::findOrFail($id);

            return view('admin.aboutPage.edit_multi_image',compact('multiImage'));
                
        }

        public function UpdateMultiImage(Request $request){
            $id = $request->id;

   


            if($request->file('multi_image')){
                $Image = $request->file('multi_image');
                $img_path = hexdec(uniqid()).'.'.$Image->getClientOriginalExtension();

                Image::make($Image)->resize(220,220)->save('upload/Multi/'.$img_path);

                $save_url = 'upload/Multi/'.$img_path;

                MultiImage::findOrFail($id)->update([
                    'multi_image'=> $save_url,
                ]);

                $notifications = array(
                    'message'=>'Updated Multi Image  Successfully',
                    'alert-type'=> 'success'
                );
            }

                

                return redirect('all/multi/image')->with($notifications);
            
        }

          public function DeleteMultiImage($id){

            $data= MultiImage::find($id);
            $image = $data->multi_image;
            unlink($image);

            $data->delete();

            $notifications = array(
                'message'=>'Delete Image  Successfully',
                'alert-type'=> 'success'
            );
            return redirect()->back()->with($notifications);
                
            }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Image;

class HomeSliderController extends Controller
{
    public function HomeSlider(){
          $home_sliderData= HomeSlider::find(1);
          return view('admin.homeslider.admin_home_slider',compact('home_sliderData'));
      }


      public function UpdateSlider(Request $request){
            $slider_id = $request->id;
            $slider = HomeSlider::find($slider_id);

            if($request->file('home_slider')){
                $slider_img = $request->file('home_slider');
                $slider_path = hexdec(uniqid()).'.'. $slider_img->getClientOriginalExtension();

                Image::make($slider_img)->resize(636,852)->save('upload/homeSlider/'.$slider_path);

                $save_url = 'upload/homeSlider/'.$slider_path;

                HomeSlider::findorFail($slider_id)->update([
                    'title'         =>  $request->title,
                    'home_intro'    =>  $request->home_intro,
                    'video'         =>  $request->video,
                    'home_slider'   =>  $save_url,
                ]);
                $notification = array(
                    'message' => 'Home Slider Updated With Image Successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            else{
                HomeSlider::findorFail($slider_id)->update([
                    'title'         =>  $request->title,
                    'home_intro'    =>  $request->home_intro,
                    'video'         =>  $request->video,
                ]);
                $notification = array(
                    'message' => 'Home Slider Updated Without Image Successfully', 
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
}

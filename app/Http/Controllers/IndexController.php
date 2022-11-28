<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;

class IndexController extends Controller
{
    public function home() {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
        // dd($slide_truyen);
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyennoibac = Truyen::where('truyen_noibac', 1)->take(20)->get();
        // dd($truyennoibac);
        $truyenxemnhieu = Truyen::where('truyen_noibac', 2)->take(20)->get();

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'truyennoibac', 'truyenxemnhieu'));
    }

    public function danhmuc($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();
        // dd($danhmuc_id);
        
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();
        
        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'theloai', 'danhmuc_id'));
    }

    public function theloai($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        // dd($theloai)->toArray();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai_id = Theloai::where('slug_theloai', $slug)->first();
        
        $tentheloai = $theloai_id->tentheloai;
        
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();

        return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'theloai','theloai_id', 'tentheloai'));
    }

    public function xemtruyen($slug) {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();
        
        $truyennoibac = Truyen::where('truyen_noibac', 1)->take(20)->get();
        $truyenxemnhieu = Truyen::where('truyen_noibac', 2)->take(20)->get();

        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id', $truyen->id)->get();
        
        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id', $truyen->id)->first();

        $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id', $truyen->id)->first();
        
        $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();

        return view('pages.truyen')->with(compact('danhmuc', 'chapter', 'truyen', 'cungdanhmuc', 'chapter_dau', 'theloai', 'chapter_moinhat','truyennoibac', 'truyenxemnhieu'));
    }

    public function xemchapter($slug)  {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get(); 

        $truyen = Chapter::where('slug_chapter', $slug)->first();

        $url_canonical = \URL::current();
        
        // end: Breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id', $truyen->truyen_id)->first();
        
        // start: Breadcrumb

        $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id', $truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();
        
        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug_chapter');
        
        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();

        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();
        
        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug_chapter');

        return view('pages.chapter')->with(compact('danhmuc', 'truyen', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai', 'truyen_breadcrumb','url_canonical'));
    }
    public function timkiem(Request $request) {
        $data = $request->all();
        // $info = Info::find(1);
        // $title = 'Tìm kiếm';

        // seo
        // $meta_desc = 'Tìm kiếm';
        // $meta_keywords = 'Tìm kiếm';
        // $url_canonical = \URL::current();
        // $og_image = url('public/uploads/logo/'.$info->logo);
        // $link_icon = url('public/uploads/logo/'.$info->logo);
        // seo

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->paginate(12);

        return view('pages.timkiem')->with(compact('danhmuc','theloai', 'tukhoa', 'truyen'));
    }
    public function timkiem_ajax(Request $request) {
        $data = $request->all();

        if($data['query']) {
            $truyen = Truyen::where('kichhoat', 0)->where('tentruyen', 'LIKE', '%'.$data['query'].'%')->get();

            $output = '
                <ul>'
                ;
            foreach($truyen as $key => $tr) {
                $output .= '
                    <li class="li_search_ajax">
                        <a href="">'.$tr->tentruyen.'</a>
                    </li>
                ';    
            }
            $output .= '</ul>';
            echo $output; 
        }
    }
    public function tag($tag) {
        // $info = Info::find(1);
        // $title = 'Tìm kiếm tags';

        // // seo
        // $meta_desc = 'Tìm kiếm';
        // $meta_keywords = 'Tìm kiếm';
        // $url_canonical = \URL::current();
        // $og_image = url('public/uploads/logo/'.$info->logo);
        // $link_icon = url('public/uploads/logo/'.$info->logo);
        // // seo
        // $slide_truyen = Truyen::with('danhmuctruyen', 'theloai')->orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
       
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $tags  = explode( "-", $tag);

        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where(
            function ($query) use ($tags) {
                for($i = 0; $i < count($tags); $i++) {
                    $query->orWhere('tukhoa', 'LIKE', '%' . $tags[$i] . '%');
                }
            })->where('kichhoat', 0)->paginate(12);
        // dd($truyen);
        
        return view('pages.tag')->with(compact('danhmuc', 'theloai', 'tag', 'truyen'));
    }
}

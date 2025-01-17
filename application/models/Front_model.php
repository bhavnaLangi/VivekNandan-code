<?php

class Front_model extends CI_Model {

    function __construct() {

    }

    function list($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    // function catshowon($tblcat, $tbl) {
    //     $query = "select * from $tblcat where status='1' AND id IN(select `category_id` from $tbl where status='1') order by id desc";
    //     return $this->db->query($query)->result_array();
    // }

    function limitList($tbl_name, $limit) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('featured', '1');
        $this->db->limit($limit);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function single_data_url($url, $col, $tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where($col, $url);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }
    function multiimage($content){
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('name', $content);
        $this->db->from('image');
        return $this->db->get()->result_array();
    }

    function fetch_data_from_search($url) {
        $this->db->select('*');
        $this->db->order_by('pdf', 'asc');
        $this->db->where('status', '1');
        $this->db->like('name', $url);
        $this->db->or_like('location', $url);
        $this->db->from('product');
        return $this->db->get()->result_array();
    }

    function single_data_url1($url, $col, $tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');

        $this->db->where($col, $url);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function home_faq($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->limit('3');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    // function frontlistbylimitfeatured($limit, $tbl) {
    //     $this->db->select('*');
    //     $this->db->order_by('id', 'DESC');

    //     $this->db->where('status', '1');
    //     $this->db->limit($limit);
    //     $this->db->from($tbl);
    //     return $this->db->get()->result_array();
    // }

    function fetchdatawithcaturl($url, $tblcat, $tbl) {
        $this->db->select('id');
        $this->db->where('url', $url);
        $this->db->from($tblcat);
        $query = $this->db->get();
        $row = $query->row();

        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('category_id', $row->id);
        $this->db->from($tbl);
        return $this->db->get()->result_array();
    }

    function featured_service($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('pdf', 'asc');

        $this->db->where('status', '1');
        $this->db->where('featured', '1');

        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function cat($id) {
        $this->db->select('*');
        $this->db->where('url', $id);
        $this->db->where('status', '1');
        $this->db->from('servicecategory');
        return $this->db->get()->result_array();
    }

    function procat($id) {
        $this->db->select('*');
        $this->db->where('url', $id);
        $this->db->where('status', '1');
        $this->db->from('tbl_category');
        return $this->db->get()->result_array();
    }

    function blogcategory_name($id) {
        $this->db->select('category_name');
        $this->db->where('id', $id);
        $this->db->from('blogcategory');
        $name_data = $this->db->get()->result_array();
        foreach ($name_data as $value) {
            return $value['category_name'];
        }
    }

    function count($tbl_name) {
        $this->db->select('*');
        $this->db->from($tbl_name);
        echo $this->db->count_all_results();
    }

    function faq_list($id) {
        $this->db->select('*');
        $this->db->where('category_id', $id);
        $this->db->where('status =', '1');
        $this->db->from('faq_list');
        return $this->db->get()->result_array();
    }
    function count_all($where,$url,$tblcat,$tbl)
    {
        $this->db->select('id');
        $this->db->where($where, $url);
        $this->db->from($tblcat);
        $query = $this->db->get();
        $row = $query->row();

        $this->db->select('*');
         $this->db->where('status', '1');
        $this->db->where('category_id', $row->id);
        // $this->db->from('blog');
        $query2 = $this->db->get($tbl);
        return $query2->num_rows();
}

    function gal_list($id) {
        $this->db->select('*');
        $this->db->where('category_id', $id);
        $this->db->where('status', '1');
        $this->db->from('gallary');
        return $this->db->get()->result_array();
    }

    function service_list($id) {
        $this->db->select('*');
        $this->db->where('category_id', $id);
        $this->db->where('status =', '1');
        $this->db->from('services');
        return $this->db->get()->result_array();
    }

    function product_catlist($id) {
        $this->db->select('*');
        $this->db->where('category_id', $id);
        $this->db->where('status =', '1');
        $this->db->from('product');
        return $this->db->get()->result_array();
    }

    function gallerycat_with_service() {
        $query = "select * from gallary_category where status='1' AND id IN(select `category_id` from `gallary` where status='1')";

        return $this->db->query($query)->result_array();
    }

    function client_with_service() {
        $query = "select * from clientelecat where status=1 AND id IN(select `category_id` from `clientele`)";

        return $this->db->query($query)->result_array();
    }

    function service_cat_with_service() {
        $query = "select * from servicecategory where status=1 AND id IN(select `category_id` from `services`)";

        return $this->db->query($query)->result_array();
    }

    function service_cat_with_service1() {
        $query = "select * from servicecategory where status=1 AND id NOT IN(select `category_id` from `services`)";

        return $this->db->query($query)->result_array();
    }

    function where($id) {
        $this->db->select('name');
        $this->db->where('category_id', $id);
        $this->db->in('status =', '1');
        $this->db->where('status =', '1');
        $this->db->from('services');
        return $this->db->get()->result_array();
    }

    function productlist($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('rowId', 'RANDOM');
//        $this->db->where('is_featured', '1');
        $this->db->limit(15);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function categorylist($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('rowId', 'RANDOM');
//        $this->db->where('is_featured=', '1');
        $this->db->limit(6);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function category_list($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('code', 'DESC');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function list1($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function list1asc($tbl_name,$w,$r) {
        $this->db->select('*');
        $this->db->order_by('id', 'asc');
        $this->db->where('name',$r);

        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }
    function list1sq($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('pdf', 'asc');
        $this->db->where('featured', '1');
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function list1hpsl($no) {
        $this->db->select('*');
        $this->db->where('slider_status', $no);
        $this->db->from('product');
        return $this->db->get()->result_array();
    }
    function blog_list_all($tbl_name,$or) {
        $this->db->select('*');

        $this->db->order_by($or, 'DESC');

        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function service_all($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function blog_list($tbl_name) {
        $this->db->select('*');
        $this->db->order_by('date', 'DESC');
        $this->db->where('status', '1');
        $this->db->limit(3);
        $this->db->from($tbl_name);
        return $this->db->get()->result_array();
    }

    function insert_table($tbl_name, $data) {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }

    function single_data_cat($url) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('url', $url);
        $this->db->from('tbl_category');
        return $this->db->get()->result_array();
    }

    function single_data_blog($url) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('blog_url', $url);
        $this->db->from('blog');
        return $this->db->get()->result_array();
    }
    function single_data_pro($url) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('url', $url);
        $this->db->from('product');
        return $this->db->get()->result_array();
    }
    function single_data_blog1($url) {
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('category_id', $url);
        $this->db->from('blog');
        return $this->db->get()->result_array();
    }

    function single_data_ser($url) {
        $this->db->select('id');
        $this->db->where('url', $url);
        $this->db->from('servicesubcategoory');
        $query = $this->db->get();
        $row = $query->row();

        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where('status', '1');
        $this->db->where('category_id', $row->id);
        $this->db->from('services');
        return $this->db->get()->result_array();
    }
    function product_list() {
        $this->db->select('*');
        $this->db->order_by('rowId', 'DESC');
        $this->db->where('u_web', 'Yes');
        $this->db->from('item_master');
        return $this->db->get()->result_array();
    }

    function single_details($tbl, $id, $val, $sort_id, $order_by) {
        $this->db->select($val);
        $this->db->where($id);
        $this->db->where('status', '1');
        $this->db->from($tbl);
        $this->db->order_by($sort_id, $order_by);
        $name_data = $this->db->get()->result_array();
        foreach ($name_data as $value) {
            return $value[$val];
        }
    }

    function view($id) {
        $this->db->select('*');
        $this->db->where('url', $id);

        $this->db->from('product_category');
        return $this->db->get()->result_array();
    }


//////////////////////////////////////////Code by shreeju/////////////////////////////////////////////////////
function commonlist($where,$id,$tbl){
    $this->db->select('*');
    $this->db->where($where,$id);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}
public function pageseo($id){
    $this->db->select('*');
    $this->db->where('pagename',$id);
   $query = $this->db->get('pagename');
   $row = $query->row();
   $this->db->select('*');
   $this->db->where('pagename',$row->id);
    $this->db->from('staticpageseo');
    return $this->db->get()->result_array();
}


//listforhomepagewithcategoryandnocategory
function frontlist($order,$desc,$tbl,$tblcat,$page_name,$limit){
    if($this->db->field_exists('category_id',$tbl)){
    if($page_name == 'home'){
    if($this->db->field_exists('featured', $tbl)){
           $query = "select * from $tbl where status='1'AND featured='1' AND category_id IN(select `id` from $tblcat where status='1') limit $limit";
        }else{
            $query = "select * from $tbl where status='1' AND category_id IN(select `id` from $tblcat where status='1') limit $limit";
        }
         return $this->db->query($query)->result_array();

    }else{
        $query = "select * from $tbl where status='1' AND category_id IN(select `id` from $tblcat where status='1') ";
        return $this->db->query($query)->result_array();
    }
}else{
    if($page_name == 'home'){
        if($this->db->field_exists('featured', $tbl)){
              $this->db->select('*');
              $this->db->where('status','1');
              $this->db->where('fetaured','1');
              $this->db->limit($limit);
              $this->db->order_by($order,$desc);
              $query =$this->db->get($tbl);
              return $query->result_array();
            }else{
                $this->db->select('*');
                $this->db->where('status','1');
                $this->db->limit($limit);
                $this->db->order_by($order,$desc);
                $query =$this->db->get($tbl);
                return $query->result_array();
            }


        }else{
               $this->db->select('*');
                $this->db->where('status','1');
                $this->db->order_by($order,$desc);
                $query = $this->db->get($tbl);
            return $query->result_array();
        }
 }
}

//forexixstingcategoryin blogsorevents
function catshowon($tblcat,$tbl) {
    $query = "select * from $tblcat where status='1' AND id IN(select `category_id` from $tbl where status='1') order by id desc";
    return $this->db->query($query)->result_array();
}


//in details page category count
function category_count($catid,$tbl){
    $this->db->select('*');
    $this->db->where('category_id',$catid);
    $this->db->where('status','1');
    $query= $this->db->get($tbl);
    return  $query->num_rows();
}
//fordetailspagefetchdatabycategoryname
function fetch_data_from_url1($url,$where,$tblcat) {
    $this->db->select('id');
    $this->db->where($where, $url);
    $this->db->where('status', '1');
    $this->db->from($tblcat);
    $query = $this->db->get();
    $row = $query->row();

    $this->db->select('*');
    $this->db->order_by('id', 'ASC');
    $this->db->where('status', '1');
    $this->db->where('category_id', $row->id);
    $this->db->from($tblcat);
    $qu= $this->db->get()->result_array();
    if(empty($qu)){

    }else{
        return $qu;
    }
}

function fetch_data_from_url($url,$where,$tblcat,$tbl) {
    $this->db->select('id');
    $this->db->where($where, $url);

    $this->db->where('status', '1');
    $this->db->from($tblcat);
    $query = $this->db->get();
    $row = $query->row();

    $this->db->select('*');

    $this->db->where('status', '1');
    $this->db->where('subcategory_id', $row->id);
    $this->db->order_by('pdf','ASC');
    $this->db->from($tbl);
    $qu = $this->db->get()->result_array();
    if(empty($qu)){
    $this->db->select('*');
    $this->db->where('status', '1');
    $this->db->order_by('pdf','ASC');
    $this->db->where('category_id', $row->id);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
    }else{
     return $qu;
    }

}

function checkul($id){
    $this->db->select('*');
    $this->db->where('status', '1');
    $this->db->where('category_id', $id);
    $this->db->from('tbl_subcategory');
    $r=$this->db->get();
    return $r->num_rows();

}
function frontlistwithstatus($order,$tbl){
    $this->db->select('*');
    if($this->db->field_exists('status', $tbl))
    {
     $this->db->where('status','1');
    }
    $this->db->order_by($order,'desc');
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}



//for previous nad next blog or events
function previous($id) {
    $this->db->select('*');
    $this->db->where('url >', $id);
    $this->db->order_by('url','Asc');
    $this->db->where('status', '1');
    $this->db->limit(1);
    $this->db->from('product');
    return $this->db->get()->result_array();
}

function frontlistwithfeaturedpro($tbl,$com){
    $this->db->select('*');
    $this->db->where('status','1');
    $this->db->where('category_id',$com);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}

function frontlistclientelehome($tbl,$com){
    $this->db->select('*');
    $this->db->where('status','1');
    $this->db->where('name',$com);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}

function next($id) {
    $this->db->select('*');
    $this->db->where('url <', $id);
    $this->db->order_by('url','Desc');
    $this->db->where('status', '1');
    $this->db->limit(1);
    $this->db->from('product');
    return $this->db->get()->result_array();
}
//recent blogs
function recentnews($id,$tbl,$limit) {
    $this->db->select('*');
    $this->db->where('url !=', $id);
    $this->db->where('status', '1');
    $this->db->limit($limit);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}
function recentnews1($id,$tbl) {
    $this->db->select('*');
    $this->db->where('ser_url !=', $id);
    $this->db->where('status', '1');

    $this->db->from($tbl);
    return $this->db->get()->result_array();
}
//listwithurl
function fronturl($id){
    $this->db->select('urlr');
    $this->db->where('name', $id);
    $this->db->from('services');
    $name_data = $this->db->get()->result_array();
    foreach ($name_data as $value) {
        return $value['urlr'];
    }
}
//listwithfeatured
function frontlistwithfeatured($order,$desc,$tbl){
    $this->db->select('*');
    $this->db->where('status','1');
    $this->db->where('featured','1');
    $this->db->order_by($order,$desc);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}

function frontlistwithorder($order,$desc,$tbl){
    $this->db->select('*');
    $this->db->where('status','1');
     $this->db->order_by($order,$desc);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}

//listwithlimitdeaturedandstatus
function frontlistbylimitfeatured($order,$desc,$limit,$tbl){
    $this->db->select('*');
    $this->db->where('status','1');
    $this->db->where('featured','1');
    $this->db->order_by($order,$desc);
    $this->db->limit($limit);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}
//listwithlimitstatus
function frontlistbylimitstatus($order,$desc,$limit,$tbl){
    $this->db->select('*');
    $this->db->where('status','1');
    $this->db->order_by($order,$desc);
    $this->db->limit($limit);
    $this->db->from($tbl);
    return $this->db->get()->result_array();
}

function listorder($tbl_name, $column_name, $fetch_id) {
    $this->db->select('*');
    $this->db->order_by('id', 'ASC');
    $this->db->where($column_name, $fetch_id);
    $this->db->from($tbl_name);
    return $this->db->get()->result_array();
}

    /////day's ago in php with date and time both

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    //day's ago in php with date
    function timeago($date) {
        $timestamp = strtotime($date);

        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60","60","24","30","12","10");

        $currentTime = time();
        if($currentTime >= $timestamp) {
             $diff     = time()- $timestamp;
             for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
             $diff = $diff / $length[$i];
             }

             $diff = round($diff);
             return $diff . " " . $strTime[$i] . "'s ago ";
        }
     }

     function fetch_detailsblog($limit, $start){
         $output = '';
        $this->db->select("*");
        $this->db->from('blog');
        $this->db->where('status','1');
        $this->db->order_by("date", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        foreach($query->result() as $bl)
        {
         $output .= '
     <div class="col-lg-6 col-md-6">
         <div class="single-news-card">
             <div class="news-img">
                 <a href="'.base_url().'news-details/'.$bl->url.'"><img src="'.base_url().'uploads/blog_feature_img/'.$bl->featured_image.'" alt="Image"></a>
             </div>
             <div class="news-content">
                 <div class="list">
                     <ul>
                         <li><i class="flaticon-tag"></i>'.$this->common->cat_name($bl->category_id,'category_name','blogcategory').'</li>
                         <li><i class="flaticon-user"></i>By '.$bl->author_id.'</li>
                         <li><i class="fa-regular fa-calendar"></i>'.$bl->date.'</li>
                     </ul>
                 </div>
                 <a href="'.base_url().'news-details/'.$bl->url.'"><h3>'.$bl->title.'</h3></a>
                 <a href="'.base_url().'news-details/'.$bl->url.'" class="read-more-btn">Read More<i class="flaticon-next"></i></a>
             </div>
         </div>
     </div>
    ';
        }

        return $output;
       }

       public function fetch_detailsblogcat($limit, $start,$id){
        $output = '';
        $this->db->select('id');
        $this->db->where('url', $id);
        $this->db->from('blogcategory');
        $query1 = $this->db->get();
        $row = $query1->row();
        $this->db->select("*");
        $this->db->from("blog");
        $this->db->where('status','1');
        $this->db->where('category_id',$row->id);
        $this->db->order_by("date", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        foreach($query->result() as $bl)
        {
            $output .= '
            <div class="col-lg-6 col-md-6">
         <div class="single-news-card">
             <div class="news-img">
                 <a href="'.base_url().'news-details/'.$bl->url.'"><img src="'.base_url().'uploads/blog_feature_img/'.$bl->featured_image.'" alt="Image"></a>
             </div>
             <div class="news-content">
                 <div class="list">
                     <ul>
                         <li><i class="flaticon-tag"></i>'.$this->common->cat_name($bl->category_id,'category_name','blogcategory').'</li>
                         <li><i class="flaticon-user"></i>By '.$bl->author_id.'</li>
                         <li><i class="fa-regular fa-calendar"></i>'.$bl->date.'</li>
                     </ul>
                 </div>
                 <a href="'.base_url().'news-details/'.$bl->url.'"><h3>'.$bl->title.'</h3></a>
                 <a href="'.base_url().'news-details/'.$bl->url.'" class="read-more-btn">Read More<i class="flaticon-next"></i></a>
             </div>
         </div>
     </div>
       ';
        }

        return $output;
       }
}


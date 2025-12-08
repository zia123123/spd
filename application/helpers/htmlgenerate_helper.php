<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('generatehtml'))
{
    
	function inputan($type,$names,$class,$placeholder,$required,$values,$tags)
        {       
            if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            $requred=$required==0?'':"required='required'";
            return "<div class='$class'><input type='$type' name='$names' placeholder='$placeholder' class='form-control' $requred value='$values' $tagtemp></div>";
        }
    
        
        
        
        // ---------------------------------- Textarea --------------------------------------------
    function textarea($name,$id,$class,$rows,$values,$required)
    {
            return "<div class='$class'><textarea name='".$name."' id='".$id."' rows='".$rows."' class='form-control' ".$required.">".$values."</textarea></div>";
    }
    
    
    function email($name,$placeholder,$required,$value)
    {
        $requred=$required==0?'':"required='required'";
        return "<input type='email' placeholder='$placeholder' name='$name' $required class='input-large' value='$value'>";
    }
    
    function combodumy($name,$id)
    {
        return "<select name='$name' id='$id' class='form-control'><option value='0'>Pilih data</option></select>";
    }
    
    function bulan()
    {
        $bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        echo"<select name='bulan' class='input-large'>
            
           ";
        for ($i=0;$i<=11;$i++)
        {
            echo" <option value=".$i.">".strtoupper($bulan[$i])."</option>";
        }
            echo"</select>";
    }
    
    
    function get_array_dosen()
    {
        $CI =& get_instance();
        $data=$CI->db->query('select * from app_dosen')->result();
        $hasil=array();
        foreach ($data as $r)
        {
            array_push($hasil, $r->dosen_id,$r->nama_lengkap);
        }
        return $hasil;
    }
    function buatcombo($nama,$table,$class,$field,$pk,$kondisi,$tags)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
		
        echo"<div class='$class'><select name='".$nama."' style='' $tagtemp>";
        foreach ($data as $r)
        {
            //echo" <option value='".$r->$pk."'>".$r->$field."</option>";
			echo"<option value='".$r->$pk."' ";
			echo $r->$pk=='M. Attar Rizal'?"selected='selected'":"";
			echo">".$r->$field."</option>";
        }
            echo"</select></div>";
    }
	function buatcombo2($nama,$table,$class,$field,$pk,$kondisi,$tags)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
		
        echo"<div class='$class'><select name='".$nama."' style='' $tagtemp>";
        foreach ($data as $r)
        {
            //echo" <option value='".$r->$pk."'>".$r->$field."</option>";
			echo"<option value='".$r->$pk."' ";
			echo $r->$pk=='Eka Prasetya Sofyan'?"selected='selected'":"";
			echo">".$r->$field."</option>";
        }
            echo"</select></div>";
    }
	
	function buatcombofilter($nama,$table,$class,$field,$pk,$kondisi,$tags)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
		
        echo"<div class='$class'><select name='".$nama."' style=''  $tagtemp>";
		echo" <option value=''></option>";
        foreach ($data as $r)
        {
            echo" <option value='".$r->$pk."'>".$r->$field."</option>";
			
        }
            echo"</select></div>";
    }
	
	function buatcombofilter_nodiv($nama,$table,$class,$field,$pk,$kondisi,$tags)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
		
        echo"<select name='".$nama."' style='' $tagtemp>";
		echo" <option value=''></option>";
        foreach ($data as $r)
        {
            echo" <option value='".$r->$pk."'>".$r->$field."</option>";
        }
            echo"</select>";
    }
    
    function buatmultiplecombo($nama,$table,$class,$field,$pk,$kondisi,$tags)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
		
        echo"<div class='$class'><select name='".$nama."' $tagtemp>";
        foreach ($data as $r)
        {
            echo" <option value='".$r->$pk."'>".$r->$field."</option>";
        }
            echo"</select></div>";
    }
	function editmultiplecombo($nama,$table,$class,$field,$pk,$kondisi,$tags,$value)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
		
        echo"<div class='$class'><select style='width:500px' name='".$nama."' $tagtemp>";
        foreach ($data as $r)
        {
            //echo" <option value='".$r->$pk."'>".$r->$field."</option>";
			//$reg = explode(",", $value);
			echo"<option value='".$r->$pk."' ";
			echo $r->$pk==$value?"selected='selected'":"";
			echo">".$r->$field."</option>";
        }
            echo"</select></div>";
    }
    function editcombo($nama,$table,$class,$field,$pk,$kondisi,$tags,$value)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
         if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
        echo"<div class='$class'><select class='form-control' name='".$nama."' $tagtemp>";
        foreach ($data as $r)
        {
            echo"<option value='".$r->$pk."' ";
			echo $r->$pk==$value?"selected='selected'":"";
			echo">".$r->$field."</option>";
        }
            echo"</select></div>";
    }
    
	function editcombofilter($nama,$table,$class,$field,$pk,$kondisi,$tags,$value)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
         if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
        echo"<div class='$class'><select style='width:300px;' name='".$nama."' $tagtemp>";
        foreach ($data as $r)
        {
            echo"<option value='".$r->$pk."' ";
			echo $r->$pk==$value?"selected='selected'":"";
			echo">".$r->$field."</option>";
        }
            echo"</select></div>";
    }
    
    function testing($id,$return,$value)
    {
        return $id==$return?$value:'&nbsp;';
    }
    
    function testing2($id,$value)
    {
        if($id==3 or $id==7)
        {
            return '&nbsp;';
        }
        else
        {
            return $value;
        }
    }
}

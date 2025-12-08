<?php
	class CI_Pdf {
		function pdf_create($html, $filename, $paper, $orientation,$view=TRUE, $stream=TRUE)
		{
			require_once("dompdf/dompdf_config.inc.php");
			spl_autoload_register('DOMPDF_autoload');
			
			ini_set("memory_limit", "999M");
			ini_set("max_execution_time", "999");
			
			$dompdf = new DOMPDF();
			$dompdf->load_html($html);
			$dompdf->set_paper($paper,$orientation);
			$dompdf->render();
			if ($stream) {
				if ($view) {
					$dompdf->stream($filename.".pdf",array('Attachment'=>0));//output ke browser	
				}else{
					$dompdf->stream($filename.".pdf",array('Attachment'=>1));//download pdf
				}				
			} else {
				$CI =& get_instance();
				$CI->load->helper("file");
				write_file($filename, $dompdf->output());
			}
		}
	}
?>
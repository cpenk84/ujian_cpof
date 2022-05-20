<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function postcurl()
    {
		$post = [
		    'email' => 'yans.123123camerount@gmail.com',
		    'nama_lengkap' => 'Ferdiansyah 123123',
		    'id_kelas'   => 213,
		    'hp' => '085946237704',
		    'instansi' => 'LPKN'
		];
        $url = 'https://sertifikat.diklatonline.id/api/createsertif';
        $curl = curl_init($url);
        // curl_setopt($curl, CURLOPT_PUT, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }
}

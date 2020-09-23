<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OngkirController extends Controller
{
    public function index(){
        return view('ongkir');
    }

    public function cek_ongkir(Request $requestphp){
        $kota_asal = $_POST['kota_asal'];
        $kota_tujuan = $_POST['kota_tujuan'];
        $kurir = $_POST['kurir'];
        $berat = $_POST['berat'] * 1000;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir . "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 97a884446189ee1ddd3aec9b67ab10c4"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        //echo json_encode($data);

        $kurir = $data['rajaongkir']['results'][0]['name'];
        $kotaasal = $data['rajaongkir']['origin_details']['city_name'];
        $provinsiasal = $data['rajaongkir']['origin_details']['province'];
        $kotatujuan = $data['rajaongkir']['destination_details']['city_name'];
        $provinsitujuan = $data['rajaongkir']['destination_details']['province'];
        $berat = $data['rajaongkir']['query']['weight'] / 1000;

        echo '<div class="card">';
        echo '<h5 class="card-header text-black" style="background-color: .bg-secondary;">';
        echo '<b>Result:</b>';
        echo '</h5>';
        echo '<div class="card-body">';
        echo '<table width="100%">';
        echo '<tr>';
        echo '<td width="15%"><b>Kurir</b> </td>';
        echo '<td>&nbsp;<b>' . $kurir . '</b></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Dari</td>';
        echo '<td>: ' . $kotaasal . ", " . $provinsiasal . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Tujuan</td>';
        echo '<td>: ' . $kotatujuan . ", " . $provinsitujuan . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Berat (Kg)</td>';
        echo '<td>: ' . $berat . '</td>';
        echo '</tr>';

        echo '</table><br>';
        echo '<table class="table table-striped table-bordered ">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nama Layanan</th>';
        echo '<th>Tarif</th>';
        echo '<th>ETD(Estimates Days)</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
            echo "<tr>";
            echo "<td>" . $value['service'] . "</td>";
            echo '';
            foreach ($value['cost'] as $tarif) {
                echo "<td align='right'>Rp " . number_format($tarif['value'], 2, ',', '.') . "</td>";
                echo "<td>" . $tarif['etd'] . " D</td>";
            }
            echo '';
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }

}

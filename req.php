<?php
$connect = mysqli_connect("localhost","root","","ongkir");

$jum=1;
while($jum<3){
$var="origin=78&weight=1000&courier=jne&destination=".$jum."&=";
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $var,
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded",
        "key: 9ba0c5721d5002c046dfe8f3357b94b8",
        "postman-token: 7dbae82e-3543-fd50-a69e-0b336e032bf1"
    )
));

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    

    $data = json_decode($response, true);
    
    for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
?>
    <div title="<?php
        echo strtoupper($data['rajaongkir']['results'][$i]['name']);
?>" style="padding:10px">
        <table border="1" width="100%" class="table table-striped">
            <tr>
                <th>No.</th>
                <th>Jenis Layanan</th>
                <th>ETD</th>
                <th>Tarif</th>
            </tr>
            <?php
        for ($j = 0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) {
            # code...
?>
                <tr>
                    <td>
                        <?php
            echo $j + 1;
?>
                    </td>
                    <td>
                        <div style="font:bold 16px Arial">
                            <?php
            echo $data['rajaongkir']['results'][$i]['costs'][$j]['service'];
?>
                        </div>
                        <div style="font:normal 11px Arial">
                            <?php
            echo $data['rajaongkir']['results'][$i]['costs'][$j]['description'];
?>
                        </div>
                    </td>
                    <td align="center">&nbsp;
                        <?php
            echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'];
?>
                    </td>
                    <td align="right">
                        <?php
            echo number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']);
?>
                    </td>
                </tr>
                <?php
        }
?>
        </table>
    </div>
    <?php
    
    
    
}}
    $jum+=1;
}
?>
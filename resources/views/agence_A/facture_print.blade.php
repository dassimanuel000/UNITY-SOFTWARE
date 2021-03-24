<!--doctype html-->
<html class="" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Stock management template" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--STYLES
        <title>{{ config('app.name', 'Laravel') }}</title>
    -->
    <title>United Construction</title>
    <!--STYLES-->
    @include('includes.agence_A.styles')
    </head>
    @php
        $i = 0;
        $t = 0;
    @endphp
    <style>
        .input-disappear{
            background: none;
            border: none;
            content: none;
        }
    </style>
<body class="theme-purple" onload="calcul_bill()">
    <div class="container-fluid" >
        <div class="row clearfix">
            <div class="col-lg-10">
                <div class="card product_item">
                    <div class="body">
                        <div id="print">
                            <div class="float-left">
                                <li></li>
                                <li>Facture pour :</li>
                                <li><span class="span_command" >{{ $facture_print->name_client }}</span></li>
                                <li>Date de délivrance : <span class="span_command">{{ date('Y-m-d H:i:s') }}</span></li>
                                <li>Entreprise : <span class="span_command">{{ $facture_print->entreprise_client }}</span></li>

                            </div>
                            <div class="float-rights"  style="margin-bottom:5%;">
                                <li>United Construction</li>
                                <li>Face complexe T. Bella</li>
                                <li>uniteconstruction@gmail.com</li>
                                <li>+(237) 677 53 78 95</li>
                            </div>
                            <table id="" class="table table-hover m-b-0">
                                <thead>
                                <tr>
                                    <th class="xs-small" data-breakpoints=" xs">N.</th>
                                    <th>Designation</th>
                                    <th>Prix Unitaire</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Command&eacute;</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Livr&eacute;</th>
                                    <th class="quantity-small-td" data-breakpoints="quantity-small-td">Reste a Livrer</th>
                                    <th data-breakpoints="cs">Total</th>
                                </tr>
                                </thead>
                                <tbody id="shopping_cart" onmouseover="calcul_bill()">
                                    @php
                                        $facture = DB::select('select * from facture');
                                        foreach ($facture as $item){

                                        echo '<tr>'
                                            .'<th>'.$i.'</th>'
                                            .'.<th>'.$item->nameProduct.'</th>'
                                            .'<th>'.'<input id="price_min_facture'.$i.'" type="text" class="input-disappear" min="50" value="'.$item->priceMinProduct.'"/>'.'</th>'
                                            .'<th>'.'<input id="quantity_facture'.$i.'" type="text" class="input-disappear" value="1" min="1"/>'.'</th>'
                                            .'<th id="livre_facture'.$i.'"></th>'
                                            .'<th id="reste_livre_facture'.$i.'"></th>'
                                            .'<th id="total_produit_facture'.$i.'"></th>'
                                        .'</tr>';
                                        $i++;
                                        $t += $item->priceMinProduct;
                                    }
                                    @endphp
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td colspan="5" align="right"> Total : </td>
                                        <td id="total_facture" colspan="2">
                                            @php
                                            $total_facture = DB::select('select priceMinProduct from facture');
                                            @endphp
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="sl-item">
                                <div class="sl-content">
                                    <small>Numero *<a href="javascript:void(0);">example</a>.</small>
                                    <small><strong>Email:</strong> uniteconstruction@gmail.com</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function calcul_bill() {
        <?php
                $php_array = $total_facture;
                $code_array = json_encode($php_array);
        ?>
        var array = <?php echo $code_array; ?>;
        let total_facture_definitif = 0;

        for (let index = 0; index < array.length; index++) {
            //const element = array[index];
            document.getElementById('total_produit_facture'+index).innerHTML = document.getElementById('price_min_facture'+index).value * document.getElementById('quantity_facture'+index).value;
            var total_facture = [];
            total_facture.length = index;
            total_facture[index] = document.getElementById('total_produit_facture'+index).innerHTML;
            total_facture_definitif += parseInt(total_facture[index]);
            document.getElementById('total_facture').innerHTML = total_facture_definitif.toLocaleString();
        }
    }
</script>
</html>

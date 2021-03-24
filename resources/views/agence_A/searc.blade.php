@foreach ($add_product as $row)
                                
                                <tr>
                                    <td data-sorting_type="asc"><span class="col-green">{{ $row->id }}</span></td>
                                    <td><img src="{{asset('uploads/stock_agence_A/'. $row->image) }}" width="48" alt="Produit"></td>
                                    <td><h5>{{ $row->referent }}</h5></td>
                                    <td><span class="text-muted">{{ $row->title }}</span></td>
                                    <td>{{ $row->description }}</td>
                                    <td><span class="text-muted">{{ $row->category }}</span></td>
                                    <td><span class="text-muted">{{ $row->quantity }}</span></td>
                                    <td class="price_min"><span class="col-green">{{ $row->price_min }}</span></td>
                                    <td class="price_max"><span class="col-red">{{ $row->price_max }}</span></td>
                                    <td><span class="text-muted">{{ $row->alarm_stock }}</span></td>
                                    <td><span class="text-muted">{{ $row->product_type }}</span></td>
                                    <td><span class="text-muted">{{ $row->provider }}</span></td>
                                    <td><span class="text-muted">{{ $row->tax }}</span></td>
                                    <td>
                                    <a href="/product-edit/{{ $row->id }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>
                                    </td>
                                    <td>
                                    <form action="/product-delete/{{ $row->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger waves-effect waves-float waves-red">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>

                                @endforeach
///////////////////////////////////////////////////////////////////////////
<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card product_item_list">
                    <div class="body">
                        <h2>Recherche des Produits</h2>
                        <!--------------------------------->
                        <script>
                        </script>
                        <!---->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Rechercher du Produit</label>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher un produit"></input>
                            </div>
                        <div class="table-responsive">
                            <h6>Nombre de resultats<span id="total_records"></span></h6>
                        </div>
                        <h3>Trier par Categorie Produit</h3>
                        <div class="body table-responsive">
                            <table id="DataTable" class="table table-hover m-b-0 table-bordered">
                                <thead>
                                <tr>
                                    <th data-breakpoints="sm xs">ID</th>
                                    <th>Image</th>
                                    <th>Referent</th>
                                    <th data-breakpoints="sm xs">Titre</th>
                                    <th data-breakpoints="xs">Description</th>
                                    <th data-breakpoints="sm xs">Categories</th>
                                    <th data-breakpoints="sm xs md">Quantit&eacute;s</th>
                                    <th data-breakpoints="sm xs md">Prix Min</th>
                                    <th data-breakpoints="sm xs md">Prix Max</th>
                                    <th data-breakpoints="sm xs md">Stock D'alarme</th>
                                    <th data-breakpoints="sm xs md">Type du Produit</th>
                                    <th data-breakpoints="sm xs md">Fournisseurs</th>
                                    <th data-breakpoints="sm xs md">Taxes</th>
                                    <th data-breakpoints="sm xs md">Editer</th>
                                    <th data-breakpoints="sm xs md">Modifier</th>
                                </tr>
                                </thead>

                                <script type="text/javascript">
                                $('#search').on('keyup',function(){
                                $value=$(this).val();
                                $.ajax({
                                type : 'get',
                                url : '{{URL::to('live_search_search')}}',
                                data:{'search':$value},
                                success:function(data){
                                $('tbody').html(data);
                                }
                                });
                                })
                                </script>
                                <script type="text/javascript">
                                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                                </script>

                                <tbody>
                                      
                                </tbody>
                            </table>
                            {{ $add_product->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ////////////////////////////////////////////////////


    if($request->ajax())
    {
    $output="";
    $add_product=DB::table('stock_agence_A')
                    ->where('title','LIKE','%'.$request->search."%")
                    ->Orwhere('description','LIKE','%'.$request->search."%")
                    ->get();
    if($add_product){
        foreach ($add_product as $key => $add_product) {
        $output.='<tr>'.
        '<td>'.'<span class="col-green">'.$add_product->id.'</span>'.'</td>'.
        '<td>'.'<img src="{{asset("uploads/stock_agence_A/".$add_product->image) }}" width="48" alt="Produit">'.'</td>'.
        '<td>'.'<h5>'.$add_product->referent.'</h5>'.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->title.'</span>'.'</td>'.
        '<td>'.$add_product->description.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->category.'</span>'.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->quanity.'</span>'.'</td>'.
        '<td>'.'<span class="col-green">'.$add_product->price_min.'</span>'.'</td>'.
        '<td>'.'<span class="col-red">'.$add_product->price_max.'</span>'.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->alarm_stock.'</span>'.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->product_type.'</span>'.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->provider.'</span>'.'</td>'.
        '<td>'.'<span class="text-muted">'.$add_product->tax.'</span>'.'</td>'.
        '<td>'.
        '<a href="/product-edit/'.$add_product->id.'" class="btn btn-default waves-effect waves-float waves-green">'.'<i class="zmdi zmdi-edit">'.'</i>'.'</a>'.
        '</td>'.
        '<td>'.
        '<form action="/product-delete/'.$add_product->id.'" method="POST">'.
            "{{ csrf_field() }}".
            '{{ method_field("DELETE") }}'.
            '<button type="submit" onclick="return confirm("Are you sure?")" class="btn btn-danger waves-effect waves-float waves-red">'.
                '<i class="zmdi zmdi-delete">'.'</i>'.
            '</button>'.
        '</form>'.
        '</td>'.
        '</tr>';
    
    }
    return Response($output);
       }
       }
    }
    /*public function action(Request $request){

        if ($request->ajax()) {    
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                
                $data = DB::table('stock_agence_A')
                        ->where('referent', 'like', '%'.$query.'%')
                        ->orwhere('title', 'like', '%'.$query.'%')
                        ->orwhere('description', 'like', '%'.$query.'%')
                        ->orwhere('category', 'like', '%'.$query.'%')
                        ->orwhere('product_type', 'like', '%'.$query.'%')
                        ->orwhere('provider', 'like', '%'.$query.'%')
                        ->orderBy('id', 'asc')
                        ->get();
            }
            else {
                $data = DB::table('stock_agence_A')
                        ->orderBy('id', 'asc')
                        ->get();
            }
            $total_data = $data->count();
            if ($total_data > 0) {
                
                foreach($data as $row){
                    $output = '
                                <tr>
                                    <td><span class="col-green">{{ $row->id }}</span></td>
                                    <td><img src="{{asset("uploads/stock_agence_A/". $row->image) }}" width="48" alt="Produit"></td>
                                    <td><h5>{{ $row->referent }}</h5></td>
                                    <td><span class="text-muted">{{ $row->title }}</span></td>
                                    <td>{{ $row->description }}</td>
                                    <td><span class="text-muted">{{ $row->category }}</span></td>
                                    <td><span class="text-muted">{{ $row->quanity }}</span></td>
                                    <td class="price_min"><span class="col-green">{{ $row->price_min }}</span></td>
                                    <td class="price_max"><span class="col-red">{{ $row->price_max }}</span></td>
                                    <td><span class="text-muted">{{ $row->alarm_stock }}</span></td>
                                    <td><span class="text-muted">{{ $row->product_type }}</span></td>
                                    <td><span class="text-muted">{{ $row->provider }}</span></td>
                                    <td><span class="text-muted">{{ $row->tax }}</span></td>
                                    <td>
                                    <a href="/product-edit/{{ $row->id }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>
                                    </td>
                                    <td>
                                    <form action="/product-delete/{{ $row->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        <button type="submit" onclick="return confirm("Are you sure?")" class="btn btn-danger waves-effect waves-float waves-red">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                                ';
                }
            }else {
                $output = '
                <tr>
                    <td align="center" colspan="10">Aucun Resultat </td>
                </tr>';
            }
            $data = array(
                'table_data'    => $output,
                'total_data'    => $total_data
            );
            echo json_encode($data);
        }
    }*/

    [[[[[[[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]]]]]]]
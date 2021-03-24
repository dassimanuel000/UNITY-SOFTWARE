<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/error_page', 'HomeController@error_page')->name('error_page');

Route::get('/', function(){
    return view('welcome');
});
Route::get('/error_page', function(){
    return view('error_page');
});

Route::get('/back', function(){
    return redirect()->back();
});


Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/dashboard', function(){
        return view('dashboard.dashboard');
    });

    Route::get('/dashboard','UserController@index')->name('dashboard.index');

    Route::get('/dashboard','ProductController@index')->name('products.index');

    /**
     * user
     * */
    Route::get('/role-register', 'Dashboard\DashboardController@registered')->name('dashboad.register.registered');

    Route::get('/role-edit/{id}', 'Dashboard\DashboardController@registeredit')->name('dashboad.register-edit.registeredit');

    Route::put('/role-register-update/{id}', 'Dashboard\DashboardController@registerupdate');

    Route::delete('/role-delete/{id}', 'Dashboard\DashboardController@registerdelete');


    /**
     * AGENCE
     * */

    Route::get('/best_product', 'Dashboard\best_productController@index')->name('dashboad.best_product.index');

    Route::get('/stat_agenceA', 'Dashboard\DashboardController@stat_agenceA')->name('dashboad.stat_agenceA.index');

    Route::get('/parametre_agence', 'Dashboard\DashboardController@parametre_agence')->name('dashboad.parametre_agence.index');

    Route::get('/form_update_initial', 'Dashboard\DashboardController@form_update_initial')->name('form_update_initial');

    /**
     * GESTION DU PERSONNEL
     * **/
     Route::get('/add_employe', 'Dashboard\DashboardController@add_employe')->name('dashboard.add_employe.index');

     Route::post('/form_add_employe', 'Dashboard\DashboardController@form_add_employe')->name('form_add_employe');

     Route::get('/list_employe', 'Dashboard\DashboardController@list_employe')->name('dashboard.list_employe.index');

     Route::get('/edit_employe/{idEmp}', 'Dashboard\DashboardController@edit_employe')->name('dashboard.edit_employe');

     Route::get('/voir_employe/{idEmp}', 'Dashboard\DashboardController@voir_employe')->name('dashboard.voir_employe');

     Route::get('/search_employe', 'Dashboard\DashboardController@search_employe')->name('search_employe');

     Route::put('/form_update_employe/{idEmp}', 'Dashboard\DashboardController@form_update_employe')->name('form_update_employe');

     Route::get('/delete_employe/{idEmp}', 'Dashboard\DashboardController@delete_employe');

     Route::get('/salaire_employe', 'Dashboard\DashboardController@salaire_employe')->name('dashboard.salaire_employe.index');


     /**
     * GESTION DES PERFORMANCES
     * **/

     Route::get('/add_upgrade', 'Dashboard\DashboardController@add_upgrade')->name('add_upgrade.index');

     Route::get('/upgrade', 'Dashboard\DashboardController@upgrade')->name('upgrade.index');

     Route::post('/form_add_upgrade', 'Dashboard\DashboardController@form_add_upgrade')->name('form_add_upgrade');

     Route::get('/edit_upgrade/{idupgrade}', 'Dashboard\DashboardController@edit_upgrade')->name('edit_upgrade');

     Route::get('/print_upgrade/{idupgrade}', 'Dashboard\DashboardController@print_upgrade')->name('print_upgrade');

     Route::get('/delete_upgrade/{idupgrade}', 'Dashboard\DashboardController@delete_upgrade')->name('delete_upgrade');

     Route::put('/form_edit_upgrade/{idupgrade}', 'Dashboard\DashboardController@form_edit_upgrade')->name('form_edit_upgrade');

     Route::get('/edit_prime/{idEmp}', 'Dashboard\DashboardController@edit_prime')->name('edit_prime');

     Route::get('/add_prime/{idEmp}', 'Dashboard\DashboardController@add_prime')->name('add_prime');

     Route::get('/print_paye/{idEmp}', 'Dashboard\DashboardController@print_paye')->name('print_paye');


});


Route::group(['middleware' => ['auth', 'Chef_agence_A']], function(){

    Route::get('/agence_A', function(){
        return view('agence_A.agence_A');
    });

    Route::get('/agence_A','Chef_agence_AController@index')->name('agence_A.index');

    Route::get('/agence_A','agence_A\all_productController@index')->name('all_product.index');

    Route::get('/add_product', 'agence_A\add_productController@index')->name('agence_A.add_product.index');

    Route::get('/parameter_products', 'agence_A\add_productController@parameter_products')->name('agence_A.parameter_products.index');

    Route::get('/form_add_family', 'agence_A\add_productController@form_add_family')->name('form_add_family');

    Route::get('/form_add_type', 'agence_A\add_productController@form_add_type')->name('form_add_type');

    Route::get('/form_add_categorie', 'agence_A\add_productController@form_add_categorie')->name('form_add_categorie');

    Route::post('/form_add_product', 'agence_A\add_productController@form_add_product')->name('form_add_product');

    Route::get('/list_product', 'agence_A\list_productController@index')->name('agence_A.list_product.index');

    Route::get('/product-edit/{id}', 'agence_A\list_productController@productedit')->name('agence_A.product-edit.productedit');

    Route::get('/show_product/{id}', 'agence_A\list_productController@productshow')->name('agence_A.show_product.productshow');

    Route::put('/product-update/{id}', 'agence_A\list_productController@productupdate');

    Route::delete('/product-delete/{id}', 'agence_A\list_productController@productdelete');


    Route::get('/search_products', 'agence_A\list_productController@search_products')->name('agence_A.search_product.index');

    Route::get('/search_product', 'agence_A\list_productController@search_product')->name('search_product');

    Route::get('/print_list_product', 'agence_A\add_productController@print_list_product')->name('agence_A.print_list_product.index');

    /**
     * DISTRUBITION DES PRODUIS
    */

    Route::get('/popup_add', 'agence_A\list_productController@popup_add')->name('popup_add');

    Route::get('/distrib_product', 'agence_A\list_productController@distrib_product')->name('distrib_product.index');

    Route::get('/distrib_product_agence_B', 'agence_A\list_productController@distrib_product_agence')->name('distrib_product_agence.index');

    Route::get('/form_remove_stock/{id}','agence_A\list_productController@form_remove_stock')->name('form_remove_stock');

    Route::get('/form_resend_stock/{id}','agence_A\list_productController@form_resend_stock')->name('form_resend_stock');

    Route::get('/search_dispatch', 'agence_A\list_productController@search_dispatch')->name('search_dispatch');

    Route::post('/add_stock', 'agence_A\list_productController@add_stock')->name('add_stock');

    Route::get('/delete_stock', 'agence_A\list_productController@delete_stock')->name('delete_stock');

    Route::put('/insert_stock', 'agence_A\list_productController@insert_stock')->name('insert_stock');

    /**
     * client
     */

    Route::get('/client_add', 'agence_A\clientController@client_add')->name('agence_A.client_add.client_add');

    Route::post('/form_client_add', 'agence_A\clientController@form_client_add')->name('form_client_add');

    Route::get('/add_client', 'agence_A\clientController@index')->name('agence_A.add_client.index');

    Route::get('/search','agence_A\clientController@search')->name('search');

    Route::get('/list_client', 'agence_A\clientController@list_client')->name('agence_A.list_client.list_client');

    Route::get('/client-edit/{id_client}', 'agence_A\clientController@clientedit')->name('agence_A.client-edit.clientedit');

    Route::get('/show_client/{id_client}', 'agence_A\clientController@clientshow')->name('agence_A.show_client.clientshow');

    Route::put('/client-update/{id_client}', 'agence_A\clientController@clientupdate');

    Route::delete('/client-delete/{id_client}', 'agence_A\clientController@clientdelete');

    Route::get('/depot_compte', 'agence_A\clientController@depot_compte')->name('agence_A.depot_compte');

    Route::get('/search_compte','agence_A\clientController@search_compte')->name('search_compte');

    Route::get('/depot_account/{id_client}', 'agence_A\clientController@depot_account')->name('agence_A.depot_account');

    Route::get('/form_add_account/{id_client}', 'agence_A\clientController@form_add_account')->name('form_add_account');

    /**
     * facture
     */

    Route::get('/facture', 'agence_A\factureController@index')->name('agence_A.facture.index');

    Route::get('/commande/{id}', 'agence_A\factureController@commande')->name('agence_A.commande.commande');

    Route::get('/account/{id}', 'agence_A\factureController@account')->name('agence_A.account.account');

    Route::get('/search_client', 'agence_A\factureController@search_client')->name('search_client');

    Route::get('/account_commande/{id_client}', 'agence_A\factureController@account_commande')->name('account_commande');

    Route::get('/account_commande_update/{id_client}', 'agence_A\factureController@account_commande_update')->name('account_commande_update');

    Route::post('/shopping_cart', 'agence_A\factureController@shopping_cart')->name('shopping_cart');


    Route::get('/destroy_cart', 'agence_A\factureController@destroy_cart')->name('destroy_cart');

    Route::get('/shopping_cart_delete', 'agence_A\factureController@delete_facture')->name('delete_facture');

    Route::get('/facture_print/{id}', 'agence_A\factureController@facture_print')->name('facture_print');

    Route::get('/update_facture/{id_facture}', 'agence_A\factureController@update_facture')->name('update_facture');

    Route::get('/change_state', 'agence_A\factureController@change_state')->name('change_state.change_state');

    Route::get('/print_facture', 'agence_A\factureController@print_facture')->name('agence_A.print_facture.index');

    Route::get('/search_print_facture', 'agence_A\factureController@search_print_facture')->name('search_print_facture');

    Route::get('/facture_emis', 'agence_A\factureController@facture_emis')->name('agence_A.facture_emis.index');

    Route::get('/facture_emis_commande/{idfacture_emis}', 'agence_A\factureController@facture_emis_commande')->name('agence_A.facture_emis_commande');


    /*
    live_commande
    */
    Route::get('/live_commande', 'agence_A\factureController@live_commande')->name('agence_A.live_commande');

    Route::get('/search_live_commande', 'agence_A\factureController@search_live_commande')->name('search_live_commande');

    Route::get('/_id_add_popup', 'agence_A\factureController@_id_add_popup')->name('_id_add_popup');

    Route::post('/add_cart', 'agence_A\factureController@add_cart')->name('add_cart');

    Route::post('/form_client_commande', 'agence_A\factureController@form_client_commande')->name('form_client_commande');

    /**
     * GESTION DU PERSONNEL
     * **/
     Route::get('/horaire', 'agence_A\personnelController@horaire')->name('agence_A.horaire.index');

     Route::get('/search_horaire', 'agence_A\personnelController@search_horaire')->name('search_horaire');

     Route::get('/add_horaire/{idEmp}', 'agence_A\personnelController@add_horaire')->name('agence_A.add_horaire');

     Route::post('/form_add_horaire', 'agence_A\personnelController@form_add_horaire')->name('form_add_horaire');

     Route::get('/view_horaire', 'agence_A\personnelController@view_horaire')->name('agence_A.view_horaire.index');

     Route::get('/search_view_horaire', 'agence_A\personnelController@search_view_horaire')->name('search_view_horaire');

     Route::get('/list_horaire/{idEmp}', 'agence_A\personnelController@list_horaire')->name('agence_A.list_horaire');


     /**
      * COMPTABILITY
     */

     Route::get('/agence_A_stock_int','agence_A\all_productController@agence_A_stock_int')->name('agence_A_stock_int.index');

     Route::get('/agence_A_stock_out','agence_A\all_productController@agence_A_stock_out')->name('agence_A_stock_out.index');

     Route::get('/agence_A_cash_int','agence_A\all_productController@agence_A_cash_int')->name('agence_A_cash_int.index');

     Route::get('/agence_A_cash_out','agence_A\all_productController@agence_A_cash_out')->name('agence_A_cash_out.index');

     Route::get('/form_compta_print','agence_A\all_productController@form_compta_print')->name('form_compta_print.index');

     Route::get('/compta_print/{request}','agence_A\all_productController@compta_print')->name('compta_print.index');



});


Route::group(['middleware' => ['auth', 'Magasin_agence_A']], function(){

    Route::get('/Magasin_agence_A', function(){
        return view('Magasin_agence_A.Magasin_agence_A');
    });

    Route::get('/Magasin_agence_A','Magasin_agence_A\Magasin_agence_AController@index')->name('Magasin_agence_A.index');

    Route::get('/Magasin_agence_A','Magasin_agence_A\Magasin_agence_AController@state')->name('state.index');

    Route::get('/facture_livraision','Magasin_agence_A\Magasin_agence_AController@facture_livraision')->name('facture_livraision.index');

    Route::get('/facture_livraision_edit','Magasin_agence_A\Magasin_agence_AController@facture_livraision_edit')->name('facture_livraision_edit.index');

    Route::get('/search_livrason','Magasin_agence_A\Magasin_agence_AController@search_livrason')->name('search_livrason');

    Route::get('/search_livrason_edit','Magasin_agence_A\Magasin_agence_AController@search_livrason_edit')->name('search_livrason_edit');

    Route::get('/modif_livrasion/{idFactureCommande}', 'Magasin_agence_A\Magasin_agence_AController@modif_livrasion')->name('Magasin_agence_A.modif_livrasion');

    Route::get('/modif_livrasion_edit/{idFactureCommande}', 'Magasin_agence_A\Magasin_agence_AController@modif_livrasion_edit')->name('Magasin_agence_A.modif_livrasion_edit');

    Route::get('/facture_livraision_definitif/{idFactureCommande}', 'Magasin_agence_A\Magasin_agence_AController@facture_livraision_definitif')->name('facture_livraision_definitif.index');

    Route::get('/facture_livraision_definitif_edit/{idFactureCommande}', 'Magasin_agence_A\Magasin_agence_AController@facture_livraision_definitif_edit')->name('facture_livraision_definitif_edit.index');

    Route::get('/liste_facture','Magasin_agence_A\Magasin_agence_AController@liste_facture')->name('liste_facture.index');

    Route::get('/search_list_facture','Magasin_agence_A\Magasin_agence_AController@search_list_facture')->name('search_list_facture');

    Route::get('/list_facture/{idFactureCommande}', 'Magasin_agence_A\Magasin_agence_AController@list_facture')->name('Magasin_agence_A.list_facture');



});


Route::group(['middleware' => ['auth', 'Chef_agence_B']], function(){

    Route::get('/Chef_agence_B', function(){
        return view('Chef_agence_B.Chef_agence_B');
    });

    Route::get('/Chef_agence_B','Chef_agence_BController\Chef_agence_BController@index')->name('Chef_agence_B.index');

    Route::get('/agence_b/reception_produit','Chef_agence_BController\Chef_agence_BController@reception_produit')->name('agence_b.reception_produit');

    Route::get('/agence_b/list_produit','Chef_agence_BController\Chef_agence_BController@list_produit')->name('agence_b.list_produit');

    Route::get('/agence_b/form_error_livraison/{id}','Chef_agence_BController\Chef_agence_BController@form_error_livraison')->name('form_error_livraison');

    Route::get('/agence_b/form_update_stock/{id}','Chef_agence_BController\Chef_agence_BController@form_update_stock')->name('form_update_stock');

    //Route::get('/agence_b/form_add_stock/{id}','Chef_agence_BController\Chef_agence_BController@form_add_stock')->name('form_add_stock');

    Route::get('/agence_b/list_product', 'Chef_agence_BController\Chef_agence_BController@list_product')->name('agence_b.list_product.index');

    Route::get('/agence_b/show_product/{id}', 'Chef_agence_BController\Chef_agence_BController@productshow')->name('agence_A.show_product.productshow');

    Route::get('/agence_b/search_products', 'Chef_agence_BController\Chef_agence_BController@search_products')->name('agence_b.search_product.index');

    Route::get('/agence_b/search_stock','Chef_agence_BController\Chef_agence_BController@search_stock')->name('search_stock');

    Route::delete('/agence_b/product-delete/{id}', 'Chef_agence_BController\Chef_agence_BController@productdelete');


});


Route::group(['middleware' => ['auth', 'client']], function(){

Route::get('/client', function(){
    return view('client.client');
});

Route::get('/client','client\client@index')->name('client.index');

Route::get('/client/dashboard','client\client@dashboard')->name('client.dashboard');

});












/*Route::prefix('product')->group(function(){
        Route::get('/','ProductController@index')->name('products.index');
        Route::get('/list','ProductController@ListProducts')->name('products.list');
        Route::get('/detail','ProductController@DetailProducts')->name('products.detail');
    });

Route::prefix('agenceA')->group(function(){
    Route::get('/','agenceAController@index')->name('agenceA.index');
});*/

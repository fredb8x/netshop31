<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION




function pr_scripts_styles() {
    wp_enqueue_script('jquery'); // just enqueue as its already registered
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
    /*   REGISTER ALL JS FOR SITE */;
    wp_register_script('mainJS', get_stylesheet_directory_uri() . '/main.js');
    /*   CALL ALL CSS AND SCRIPTS FOR SITE */
    wp_enqueue_script('mainJS');
 }
 add_action( 'wp_enqueue_scripts', 'pr_scripts_styles' );






//  add_filter( 'woocommerce_subcategory_count_html', 'wc_filter_woocommerce_subcat_count_html', 10, 2 );

//  function wc_filter_woocommerce_subcat_count_html( $mark_class_count_category_count_mark, $category ) {
//      $pluriel ="";
//      if ($category->count > 1){
//         $pluriel ="s";
//      }
//     $mark_class_count_category_count_mark = ' <mark class="count">' . $category->count . ' Produit'. $pluriel .'</mark>';
//     return $mark_class_count_category_count_mark;
//  };





//  function rs_woo_cart_attributes($cart_item, $cart_item_key) {
//     global $product; 
//     if (is_cart()){ 
//         echo "<style>#checkout_thumbnail{visibility:hidden;}</style>"; 
//     } 
//     $item_data = $cart_item_key['data']; 
//     $post = get_post($item_data->get_id()); 
//     $thumb = get_the_post_thumbnail($item_data->get_id(), array( 32, 50)); 
//     echo '<div id="checkout_thumbnail" style="float: left; padding-right: 8px">' . $thumb . '</div> ' . $post->post_title;
// }

// add_filter('woocommerce_cart_item_name', 'rs_woo_cart_attributes', 10, 2);







/**
 * @snippet       Print List of Category IDs @ Product Categories Admin
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'product_cat_pre_add_form', 'bbloomer_list_all_product_cat_ids', 5 );
  
function bbloomer_list_all_product_cat_ids() {
  
    $ids = '';
    
    $categories = get_categories( array(               
    'taxonomy' => 'product_cat' ) );
    
    foreach( $categories as $category ) {
        $ids .= $category->term_id . ', ';
    } 
    
    echo 'Category IDs: ' . $ids;
}


/* Modifier le nom des bloc d'informations WooCommerce */

add_filter( 'woocommerce_product_tabs', 'wpm_rename_tabs', 98 );
function wpm_rename_tabs( $tabs ) {

    // $tabs['Produits par lot']['title'] = __( 'Produits de la Box' );
    // $tabs['lots']['title'] = __( 'La Box Netshop31' );     // Renomme le bloc "Description"
    // $tabs['reviews']['title'] = __( 'Avis de nos clients' );                // Renomme le bloc "Avis"
    // $tabs['additional_information']['title'] = __( '+ d\'infos' );  // Renomme le bloc "Informations complémentaires"

    global $product;

    if ( isset( $tabs['description'] ) ) {
        // Renomme le bloc "Description"
        $tabs['description']['title'] = __( 'A propos de ce produit' );     
    }
    
    // Renomme les onglets de l'extension WPC CLEVER : Bunddle de produits    
    global $wp_query;
    $terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
    foreach ($terms_post as $term_cat) { 
        $term_cat_id = $term_cat->term_id; 
        if ($term_cat_id == '26') {
            # ID de la categorie des BOX
            # Si on a la catégorie Box
            break;
        }
    }

    if ( isset( $tabs['woosb'] ) ) {
        if($term_cat_id == '26') {
            // Renomme l'onglet "Produit par lot"
            $tabs['woosb']['title'] = __( 'Description des produits de la Box' );
        }else{
            // Renomme l'onglet "Lots"
            $tabs['woosb']['title'] = __( 'Aussi dans la Box Netshop31' );
        }

    }

    // on enlève l'onglet des informations complémentaires qui affiche par exemple le poids des articles
    unset( $tabs['additional_information'] );

    return $tabs;

}


/* Retire les produits téléchargeable du compte utilisateur connecté */
function custom_my_account_menu_items( $items ) {
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );


/* Affiche un bandeau image sur la page des categories */
add_action( 'woocommerce_before_main_content', 'fbx_woo_cat_banner', 10 );
function fbx_woo_cat_banner() {

    // ID category courante
    $term = get_queried_object();
    $term_cat_id = $term->term_id;

    // tableau de correspondance entre les categories et les template Divi
    $a = array(
        "box" => 26,

        "hygiene" => 33,
        "bureau" => 98,
        "naturel" => 97,
        "sanitaires" => 96,
        "cheminée" => 95,
        "cuisine" => 41,
        "plancha" => 94,
        "sol" => 29,

        "vehicules" => 93,
        "voiture" => 51,
        "moto" => 23,
        "vehicules-autre" => 22,

        "materiel" => 32,

        "desodorant-surodorant" => 30,
        "desodorant" => 24,
        "surodorant" => 25,

        "animaux" => 31,
        "chat" => 43,
        "chien" => 45,
        "puppy" => 46,
        "shampoing" => 42
    );
    $d = array(
        "box" => 694,

        "hygiene" => 778,
        "bureau" => 778,
        "naturel" => 783,
        "sanitaires" => 778,
        "cheminée" => 781,
        "cuisine" => 747,
        "plancha" => 771,
        "sol" => 778,

        "vehicules" => 788,
        "voiture" => 711,
        "moto" => 698,
        "vehicules-autre" => 788,

        "materiel" => 1040,

        "desodorant-surodorant" => 792,
        "desodorant" => 792,
        "surodorant" => 792,

        "animaux" => 691,
        "chat" => 691,
        "chien" => 691,
        "puppy" => 691,
        "shampoing" => 691
    );
    // Affiche le bon bandeau sur la page de catégorie de produits en fonction de celle-ci
    // Va chercher un module global divi
    foreach ($a as $k => $v) {
        if($v == $term_cat_id) {
            echo do_shortcode('[et_pb_section global_module="' . $d[$k] . '"][/et_pb_section]');
            break;
        }
    }

}

// Ajoute une class sur le body avec l'identifiant de la catégorie parente
add_filter( 'body_class', 'parent_id_body_class' );
function parent_id_body_class( $classes ) {
    // add comprehensive text followed by parent id number to the $classes array
    $term = get_queried_object();
    $parent_id = $term->parent;
    $classes[] = 'parent-id-' . $parent_id;

    // on s'assure que le modèle des boutons est le même partout
    array_push($classes, 'et_button_left', 'woocommerce');
    // return the $classes array
    return $classes;
}


// Cas template Divi
// Remet le bouton "Ajouter au panier" sur la page de catégorie de produits
// register add to cart action
function dac_add_cart_button () {
    add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action( 'after_setup_theme', 'dac_add_cart_button' );
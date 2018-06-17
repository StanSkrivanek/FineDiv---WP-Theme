<?php

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

add_action('cmb2_init', 'FineDiv_register_metabox');

function FineDiv_register_metabox()
{
  $prefix = '_workshop_data_';

  /**
   * ====================
   *  Metabox - Workshop
   * ====================
   */
  $cmb_data = new_cmb2_box(array(
    'id' => $prefix . 'metabox',
    'title' => esc_html__('Workshop data', 'workshops'),
    // 'show_on' => array('key' => 'page-template', 'value' => 'wks-form.php'),
    'object_types' => array('workshops'), // Post type

    // Add the name of your function to override the default row render method
    'render_row_cb' => 'override_render_field_callback',
        // 'show_on_cb' => 'FineDiv_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
    // 'show_names' => false, // Show field names on the left
    //'cmb_styles' => false, // false to disable the CMB stylesheet
//         'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'FineDiv_add_some_classes', // Add classes through a callback.
  ));

  /**
   * ====================
   *  Metabox fields - Workshop
   * ====================
   */

  $cmb_data->add_field(array(
    'name' => esc_html__('Full Event Name', 'workshops'),
    'desc' => esc_html__('', 'workshops'),
    'id' => $prefix . 'wks-name',
    'type' => 'text',
    // 'on_front' => false
  )); // v-address

  $cmb_data->add_field(array(
    'name' => __('Event Date', 'workshops'),
    'desc' => __('Event Date', 'workshops'),
    'id' => $prefix . 'event_date',
    'type' => 'text_date_timestamp',
    'date_format' => 'd-m-Y',
//        'attributes' => array(
//            // CMB2 checks for datepicker override data here:
//            'data-datepicker' => json_encode( array(
//                // dayNames: http://api.jqueryui.com/datepicker/#option-dayNames
//                'dayNames' => array(  'Neděle', 'Pondělí', 'Útery', 'Středa', 'Čtvrtek', 'Pátek', 'Sobota' ),
//                'dayNamesMin' => array('Ne', 'Po', 'Út', 'St', 'Čt','Pá', 'So'),
//                // monthNamesShort: http://api.jqueryui.com/datepicker/#option-monthNamesShort
////                'monthNames' => explode( ',', 'Leden, Únor, Březen, Duben, Květen, Červen, Červenec, Srpen, Září, Říjen, Listopad, Prosinec' ),
//                'monthNamesShort' => explode( ',', 'Led, Úno, Bře, Dub, Kvě, Čer, Črv, Srp, Zář, Říj, Lis, Pro' ),
//                // yearRange: http://api.jqueryui.com/datepicker/#option-yearRange
//                // and http://stackoverflow.com/a/13865256/1883421
//                'yearRange' => '-100:+0',
//                // Get 1990 through 10 years from now.
//                // 'yearRange' => '1990:'. ( date( 'Y' ) + 10 ),
//            ) ),
//        ),
//        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
//        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
//        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
//        // 'on_front'        => false, // Optionally designate a field to wp-admin only
//        // 'repeatable'      => true,
  ));

  $cmb_data->add_field(array(
    'name' => esc_html__('Location', 'workshops'),
    'desc' => 'Drag the marker to set the exact location',
    'id' => $prefix . 'location',
    'type' => 'pw_map',
    'split_values' => true, // Save latitude and longitude as two separate fields
  )); // location

  $cmb_data->add_field(array(
    'name' => esc_html__('Venue Address ', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'v-address',
    'type' => 'text',
    'on_front' => false,
  )); // v-address

  $cmb_data->add_field(array(
    'name' => esc_html__('Town ', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'town',
    'type' => 'text',
    'on_front' => false,
  )); // town

  $cmb_data->add_field(array(
    'name' => esc_html__('Country', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'country',
    'type' => 'radio_inline',
    'options' => array(
      'CZ' => esc_html__('CZ', 'workshops'),
      'SK' => esc_html__('SK', 'workshops'),
    ),
  )); // country

  $cmb_data->add_field(array(
    'name' => esc_html__('excerpt', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'excerpt',
    'type' => 'textarea',
  )); // excerpt


  $cmb_data->add_field(array(
    'name' => esc_html__('Price CZK', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'wks_price-cz',
    'type' => 'text_money',
    'before_field' => 'CZK',
  )); // wks_price-cz

  $cmb_data->add_field(array(
    'name' => esc_html__('Price Euro', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'wks_price-sk',
    'type' => 'text_money',
    'before_field' => '€',
  )); // wks_price-sk

  $cmb_data->add_field(array(
    'name' => esc_html__('Leader ', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'leader',
    'type' => 'text',
    'attributes' => array(
      'placeholder' => 'Name',
      'style' => 'text-transform: capitalize;',
    ),
  )); // leader

  $cmb_data->add_field(array(
    'name' => esc_html__('about me', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'about_me',
    'type' => 'textarea',

  )); // about_me

  $cmb_data->add_field(array(
    'name' => esc_html__('Sign in form URL', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'wks_url',
    'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
  )); // wks_url

  $cmb_data->add_field(array(
    'name' => esc_html__('Introduction', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'introduction',
    'type' => 'textarea',
  )); // introduction

  $cmb_data->add_field(array(
    'name' => esc_html__('Who is this for ?', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'isfor',
    'type' => 'textarea',
  )); // isfor

  $cmb_data->add_field(array(
    'name' => esc_html__('What you will learn?', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'youlearn',
    'type' => 'textarea',
  )); // youlearn

  $cmb_data->add_field(array(
    'name' => esc_html__('What do you need?', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'youneed',
    'type' => 'textarea',
  )); // youneed

  $cmb_data->add_field(array(
    'name' => esc_html__('What is Included ?', 'workshops'),
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => $prefix . 'included',
    'type' => 'multicheck',
    'options' => array(
      'Lunch & Snaks' => esc_html__('Lunch & Snaks', 'workshops'),
      'Coffee or Tee' => esc_html__('Coffee or Tee', 'workshops'),
      'Papper and Pen' => esc_html__('Papper and Pen', 'workshops'),
    ),
    'inline' => true, // Toggles display to inline
    'select_all_button' => false,
  )); // included

// ===========================================================
// GROUP TIME
// ===========================================================
  $wks_timetable = $cmb_data->add_field(array(
    'id' => $prefix . 'wks_timetable',
    'type' => 'group',
    'description' => __('Generates reusable form entries', 'workshops'),
        // 'repeatable'  => false, // use false if you want non-repeatable group
    'options' => array(
      'group_title' => __('Timetable {#}', 'workshops'),
            // since version 1.1.4, {#} gets replaced by row number
      'add_button' => __('Add Another Entry', 'workshops'),
      'remove_button' => __('Remove Entry', 'workshops'),
      'sortable' => true,
            // 'closed'     => true, // true to have the groups closed by default
    ),
  )); // wks_timetable

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.

  $cmb_data->add_group_field($wks_timetable, array(
    'name' => 'Time',
    'desc' => esc_html__('field description (optional)', 'workshops'),
    'id' => 'wks_time',
    'type' => 'text_time',
    'date_format' => '24',
    'time_format' => 'H:i',

  )); // wks_time
  $cmb_data->add_group_field($wks_timetable, array(
    'name' => 'What\'s Up',
    'id' => 'wks_whats_up',
    'type' => 'text',
//         'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
  )); // wks_whats_up

}




<?php
/*
 *
 * testing metabox code
 *
 */
?>

<?php

/* Step one: create the meta box  */

function add_custom_meta_box() {
  add_meta_box(
    'custom_meta_box', // $id
    'Custom Meta Box', // $title
    'show_custom_meta_box', // $callback
    'post', // $page
    'normal', // $context
    'high'); // $priority
}

add_action('add_meta_boxes', 'add_custom_meta_box');


/* Step two: Create the Field Array  */

$prefix = 'custom_';
$custom_meta_fields = array(
  array(
    'label'=> 'Text Input',
    'desc'  => 'A description for the field.',
    'id'    => $prefix.'text',
    'type'  => 'text'
  ),
  array(
    'label'=> 'Textarea',
    'desc'  => 'A description for the field.',
    'id'    => $prefix.'textarea',
    'type'  => 'textarea'
  ),
  array(
    'label'=> 'Checkbox Input',
    'desc'  => 'A description for the field.',
    'id'    => $prefix.'checkbox',
    'type'  => 'checkbox'
  ),
  array(
    'label'=> 'Select Box',
    'desc'  => 'A description for the field.',
    'id'    => $prefix.'select',
    'type'  => 'select',
    'options' => array (
      'one' => array (
        'label' => 'Option One',
        'value' => 'one'
      ),
      'two' => array (
        'label' => 'Option Two',
        'value' => 'two'
      ),
      'three' => array (
        'label' => 'Option Three',
        'value' => 'three'
      )
    )
  )
);

/* Step Three: outputting the fields */
// The Callback
function show_custom_meta_box() {
  global $custom_meta_fields, $post;
  // Use nonce for verification
  echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

  // Begin the field table and loop
  echo '<table class="form-table">';
  foreach ($custom_meta_fields as $field) {
    // get value of this field if it exists for this post
    $meta = get_post_meta($post->ID, $field['id'], true);
    // begin a table row with
    echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
    switch($field['type']) {
      // case items will go here

      case 'text':
        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
        <br /><span class="description">'.$field['desc'].'</span>';
        break;

      // textarea
      case 'textarea':
        echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'">'.$meta.'</textarea>
        <br /><span class="description">'.$field['desc'].'</span>';
        break;


      // checkbox
      case 'checkbox':
        echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
        break;

      case 'select':
        echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
        foreach ($field['options'] as $option) {
          echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
      }
        echo '</select><br /><span class="description">'.$field['desc'].'</span>';
        break;

    } //end switch
    echo '</td></tr>';
  } // end foreach
  echo '</table>'; // end table
}



/* Save the Data */
function save_custom_meta($post_id) {
  global $custom_meta_fields;

  // verify nonce
  if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
    return $post_id;
  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return $post_id;
  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id))
      return $post_id;
  } elseif (!current_user_can('edit_post', $post_id)) {
    return $post_id;
  }

  // loop through fields and save the data
  foreach ($custom_meta_fields as $field) {
    $old = get_post_meta($post_id, $field['id'], true);
    $new = $_POST[$field['id']];
    if ($new && $new != $old) {
      update_post_meta($post_id, $field['id'], $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $field['id'], $old);
    }
  } // end foreach
}
add_action('save_post', 'save_custom_meta');


?>

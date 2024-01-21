<?php

Redux::set_section($opt_name, array(
    'title'      => __('Social Icons', 'your-textdomain'),
    'id'         => 'yhpot_opt_social_icons_sec',
    'fields'     => array(
       array(
          'id'       => 'yhpot_opt_social_icons',
          'type'     => 'repeater',
          'title'    => __('Social Icons', 'your-textdomain'),
          'subtitle' => __('Add as many as you want', 'your-textdomain'),
          'group_values' => true,
          'fields'   => array(
             array(
                'id'   => 'yhpot_opt_social_name',
                'type' => 'text',
                'title' => __('Name', 'your-textdomain'),
             ),
             array(
                'id'   => 'yhpot_opt_social_link',
                'type' => 'text',
                'title' => __('Link', 'your-textdomain'),
             ),             
             array(
                'id'   => 'yhpot_opt_social_icon',
                'type' => 'text',
                'title' => __('Fontawesome class', 'your-textdomain'),
             ),            
          )
       )
    )
 ));
 
<?php
/**
 * DOMPDF - PHP5 HTML to PDF renderer
 *
 * File: $RCSfile: list_bullet_image_frame_decorator.cls.php,v $
 * Created on: 2005-06-28
 *
 * Copyright (c) 2004 - Benj Carson <benjcarson@digitaljunkies.ca>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this library in the file LICENSE.LGPL; if not, write to the
 * Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 * 02111-1307 USA
 *
 * Alternatively, you may distribute this software under the terms of the
 * PHP License, version 3.0 or later.  A copy of this license should have
 * been distributed with this file in the file LICENSE.PHP .  If this is not
 * the case, you can obtain a copy at http://www.php.net/license/3_0.txt.
 *
 * The latest version of DOMPDF might be available at:
 * http://www.digitaljunkies.ca/dompdf
 *
 * @link http://www.digitaljunkies.ca/dompdf
 * @copyright 2004 Benj Carson
 * @author Benj Carson <benjcarson@digitaljunkies.ca>
 * @package dompdf
 * @version 0.5.1
 */

/* $Id: list_bullet_image_frame_decorator.cls.php,v 1.4 2006/07/07 21:31:03 benjcarson Exp $ */

/**
 * Decorates frames for list bullets with custom images
 *
 * @access private
 * @package dompdf
 */
class List_Bullet_Image_Frame_Decorator extends Frame_Decorator {

  /**
   * The underlying image frame
   * 
   * @var Image_Frame_Decorator
   */
  protected $_img;

  /**
   * The image's width in pixels
   *
   * @var int
   */
  protected $_width;
  
  /**
   * The image's height in pixels
   *
   * @var int
   */
  protected $_height;

  /**
   * Class constructor
   *
   * @param Frame $frame the bullet frame to decorate
   * @param DOMPDF $dompdf the document's dompdf object
   */
  function __construct(Frame $frame, DOMPDF $dompdf) {
    $url = $frame->get_style()->list_style_image;
    $frame->get_node()->setAttribute("src", $url);
    $this->_img = new Image_Frame_Decorator($frame, $dompdf);
    parent::__construct($this->_img, $dompdf);
    list($width, $height) = getimagesize($this->_img->get_image_url());

    // Resample the bullet image to be consistent with 'auto' sized images
    $this->_width = ((float)rtrim($width, "px")) * 72 / DOMPDF_DPI;
    $this->_height = ((float)rtrim($height, "px")) * 72 / DOMPDF_DPI;
    
  }

  /**
   * Return the bullet's width
   *
   * @return int
   */
  function get_width() {
    return $this->_width;
  }

  /**
   * Return the bullet's height
   *
   * @return int
   */
  function get_height() {
    return $this->_height;
  }
  
  /**
   * Override get_margin_width()
   *
   * @return int
   */
  function get_margin_width() {
    return $this->_width + List_Bullet_Frame_Decorator::BULLET_PADDING;
  }

  /**
   * Override get_margin_height()
   *
   * @return int
   */
  function get_margin_height() {
    return $this->_height + List_Bullet_Frame_Decorator::BULLET_PADDING;
  }

  /**
   * Return image url
   *
   * @return string
   */
  function get_image_url() {
    return $this->_img->get_image_url();
  }

  /**
   * Return the image extension
   *
   * @return string
   */
  function get_image_ext() {
    return $this->_img->get_image_ext();
  }
  
}

?>
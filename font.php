<?php
/*
	This is part of a program for simpler font management.
    Copyright (C) 2014 Christoph "criztovyl" Schulz

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
class Font{
    private $name;
    private $face_name;
    private $eot_file;
    private $woff_file;
    private $ttf_file;
    private $svg_file;
    public function __construct($name, $pathPrefix = '', $pathSuffix = ''){
        $this->name = $name;
        $fullName = $pathPrefix . $name . $pathSuffix;
        $this->eot_file = $fullName.'.eot';
        $this->woff_file = $fullName.'.woff';
        $this->ttf_file = $fullName.'.ttf';
        $this->svg_file = $fullName.'.svg';

    }
    public function setLicense($license){
        $this->license = $license;
    }
    public function css(){
        return sprintf(<<<EOT
/*
    '%s' font
    %s
 */
@font-face {
    font-family: %1\$s;
    src: url('%3\$s');
    src: url('%s?#iefix') format('embedded-opentype'),
        url('%s') format('woff'),
        url('%s') format('truetype'),
        url('%s') format('svg');
        font-weight: normal;
        font-style: normal;
    }
EOT
, $this->name, $this->license['copyrightline'], $this->eot_file, $this->woff_file, $this->ttf_file, $this->svg_file);
   }
}
/*
header('Content-type: text/css');
$font = new Font('Cinzel-Regular', 'fonts/', '-webfont');
$font->setLicense(array('copyrightline' => 'Not Licensed.', 'licensefile' => ''));
echo $font->css();
 */
?>

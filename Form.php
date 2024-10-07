<?php
class Form {
    private $action;
    private $method;
    private $elements = [];

    public function __construct($action, $method = 'POST') {
        $this->action = $action;
        $this->method = $method;
    }

    // Input text
    public function inputText($name, $label, $value = '', $attributes = '') {
        $this->elements[] = "<label for='$name'>$label</label><input type='text' name='$name' id='$name' value='$value' $attributes><br>";
    }

    // Input password
    public function inputPassword($name, $label, $attributes = '') {
        $this->elements[] = "<label for='$name'>$label</label><input type='password' name='$name' id='$name' $attributes><br>";
    }

    // Radio button
    public function inputRadio($name, $label, $options = [], $selected = null) {
        $html = "<label>$label</label><br>";
        foreach ($options as $value => $optionLabel) {
            $checked = ($value == $selected) ? 'checked' : '';
            $html .= "<input type='radio' name='$name' value='$value' $checked>$optionLabel<br>";
        }
        $this->elements[] = $html;
    }

    // Checkbox
    public function inputCheckbox($name, $label, $value = '', $isChecked = false) {
        $checked = $isChecked ? 'checked' : '';
        $this->elements[] = "<label for='$name'>$label</label><input type='checkbox' name='$name' value='$value' id='$name' $checked><br>";
    }

    // Dropdown/Select
    public function inputDropdown($name, $label, $options = [], $selected = null) {
        $html = "<label for='$name'>$label</label><select name='$name' id='$name'>";
        foreach ($options as $value => $optionLabel) {
            $isSelected = ($value == $selected) ? 'selected' : '';
            $html .= "<option value='$value' $isSelected>$optionLabel</option>";
        }
        $html .= "</select><br>";
        $this->elements[] = $html;
    }

    // Textarea
    public function inputTextarea($name, $label, $value = '', $attributes = '') {
        $this->elements[] = "<label for='$name'>$label</label><textarea name='$name' id='$name' $attributes>$value</textarea><br>";
    }

    // Render the form
    public function renderForm() {
        echo "<form action='$this->action' method='$this->method'>";
        foreach ($this->elements as $element) {
            echo $element;
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
}

// Example usage
$form = new Form('process.php');
$form->inputText('nama_destinasi', 'Nama Destinasi');
$form->inputTextarea('deskripsi', 'Deskripsi');
$form->inputText('lokasi', 'Lokasi');
$form->inputText('htm', 'Harga Tiket Masuk (HTM)');
$form->inputPassword('password', 'Password');
$form->inputRadio('tipe_transport', 'Tipe Transport', ['bis' => 'Bus', 'mobil' => 'Mobil'], 'bis');
$form->inputCheckbox('confirm', 'Konfirmasi', 'yes');
$form->inputDropdown('destination_id', 'Pilih Destinasi', [1 => 'Pantai Kuta', 2 => 'Gunung Bromo'], 1);
$form->renderForm();
?>
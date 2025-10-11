<?php
namespace Model;

class Message
{
    public static function getMessage()
    {
        if (isset($_SESSION['errors'])) {
            echo '<div class="alert alert-danger">';

            if (is_array($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $field => $messages) {
                    if (is_array($messages)) {
                        foreach ($messages as $msg) {
                            echo "<div>• $msg</div>";
                        }
                    } else {
                        echo "<div>• $messages</div>";
                    }
                }
            } else {
                echo "<div>• {$_SESSION['errors']}</div>";
            }

            echo '</div>';
            unset($_SESSION['errors']);
        }

        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
    }
}
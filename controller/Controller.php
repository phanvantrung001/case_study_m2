<?php
    // namespace Controller;
    class Controller{
        function redirect($url){
            ?>
                <script>
                    if (confirm('Succesfull')) {
                        window.location = "<?= $url?>"
                    }
                </script>
            <?php
        }
    }
?>
<?php
$api = new squarelink_API();
$website = $api->getWebsite(get_option('squarelink_setting_siteid'));
?>
<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
    <h2>Réglages du plugin Square Link</h2>
    <br/>
    <h3>Configuration de votre site</h3>
    <?php if(is_null($website)) { ?>
        <div id="setting-error-settings_updated" class="updated settings-error"> 
            <p><strong>Attention</strong>, vous devez renseigner l'identifiant de votre site pour pouvoir afficher des emplacements sur votre site.</p>
        </div>
    <?php } ?>
    <form method="post" action="options.php"> 
        <?php @settings_fields('squarelink_settings_group'); ?>
        <?php @do_settings_fields('squarelink_settings_group'); ?>
        <table class="form-table">  
            <tr valign="top">
                <th scope="row"><label for="squarelink_setting_siteid">Identifiant du site</label></th>
                <td>
                    <input type="text" name="squarelink_setting_siteid" id="squarelink_setting_siteid" 
                    value="<?php echo get_option('squarelink_setting_siteid'); ?>" />
                </td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>

    <?php if(is_null($website)) { ?>
        <br/>
        <h3>Où trouver mon identifiant ?</h3>
        <p>Votre identifiant est affiché dans la partie "Sites Web" de votre application Square Link pour les éditeurs. Pour y accéder, rendez-vous sur la page <a href="https://app.square-link.com/publisher/sites" target="_blank">https://app.square-link.com/publisher/sites</a></p>
        <p><i>Information</i> : votre identifiant est une suite de lettres et chiffres par exemple "<i>3b2b79d0667e6e43ee962fc3ff6349f6</i>".</p>
        <br/>
        <a href="https://app.square-link.com/publisher/sites" target="_blank">
            <img src="<?php echo plugin_dir_url( __FILE__ ).'/assets/screenshot-3.png'; ?>" with="600" height="282" style="border:1px solid #cccccc;" />
        </a>

    <?php } else { ?>
        <h3 style="border-top:1px solid #cccccc;padding-top:30px;">Informations de votre site</h3>
        <p><b><?php echo $website->name; ?></b></p>
        <p><img src="http://g.etfv.co/<?php echo $website->url; ?>" with="16" height="16" style="vertical-align:middle;" /> 
            <?php echo $website->url; ?></p>
        <p><?php echo $website->description; ?></p>
        <br/>
        <h3>Espaces disponibles sur votre site</h3>
        <table class="widefat page fixed sis">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Taille</th>
                    <th>Type</th>
                    <th>Identifiant</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $spaces = $website->spaces;
                    foreach ($spaces as $space) {

                        switch ($space->type) {
                            case 'plan':
                                $type = 'Forfait';
                                break;
                            case 'cpm':
                                $type = 'CPM';
                                break;
                            case 'cpc':
                                $type = 'CPC';
                                break;
                        }

                        echo "<tr>
                            <td>$space->name</td>
                            <td>$space->width x $space->height</td>
                            <td>$type</td>
                            <td>$space->token</td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <br/>
    <?php } ?>
</div>
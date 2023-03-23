<?php

/**
 * CUSTOM TEMPLATE FOR SUPPORT PIN SIDEBAR
 *
 * TO ACTIVATE SIDEBAR, RENAME "sidebar_widget_rename.php" TO "hooks.php".
 * MORE INFORMATIONS: https://docs.deploymentcode.com/Support_PIN_for_Client_Verification_(WHMCS)
*/

$HAS_PIN = '<div class="form-group">
                <form class="input-group col-md-12" action="' . $GenPin . '" method="post">
                        <div style="margin-bottom: 5px;" class="alert alert-info">' . supportpin_getlang('OrderSystem', "$language", "sidebar_havepin")  . ' ' . $PINCODE . '</div>
                        
                        <button style="margin-top: 2px; margin-bottom: -5px;" type="submit" class="btn btn-success btn-block">' . supportpin_getlang('OrderSystem', "$language", "sidebar_generatebutton") . '</button>
                </form>
            </div>';

$HAS_NO_PIN = '<div class="form-group">
                    <form class="input-group  col-md-12" action="' . $GenPin . '" method="post">
                            <div style="margin-bottom: 5px;" class="alert alert-info">' . supportpin_getlang('OrderSystem', "$language", "sidebar_nopin") . '</div>
                            
                            <button style="margin-top: 2px; margin-bottom: -5px;" type="submit" class="btn btn-success btn-block">' . supportpin_getlang('OrderSystem', "$language", "sidebar_generatebutton") . '</button>
                    </form>
              </div>';
<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('New Address' , 'my-plugin' ); ?></h1>


    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row" >
                        <label for="name"><?php _e('Name' , 'my-plugin' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row" >
                        <label for="Address"><?php _e('Address' , 'my-plugin' ); ?></label>
                    </th>
                    <td>
                       <textarea class="regular-text" name="address" id="address"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row" >
                        <label for="Phone"><?php _e('Phone' , 'my-plugin' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>


        <?php wp_nonce_field( 'new_address' ); ?>
        <?php submit_button( __('Add Address' , 'my-plugin') , 'primary' , 'submit_address' ); ?>
    </form>
    
</div>
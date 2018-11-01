<div class="row">
    <div class="col-md-6">
        <div class="block">
            <?php
                $package_info = $this->db->get_where('member', array('member_id' => $member_id))->row()->package_info;
                $package_info = json_decode($package_info, true);
            ?>
            <h5><?php echo translate('your_current_package')?></h5>
            <div class="text-left">
                <div class="px-2 py-2">
                    <table class="table table-condensed table-bordered">
                        <tbody>
                            <tr>
                                <th><?php echo translate('user_package')?></th>
                                <td><?=$package_info[0]['current_package']?></td>
                            </tr>
                            <tr>
                                <th><?php echo translate('package_price')?></th>
                                <td><?=currency('', 'def'). $package_info[0]['package_price']?></td>
                            </tr>
                            <tr>
                                <th><?php echo translate('payment_gateway')?></th>
                                <td><?=$package_info[0]['payment_type']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="block">
            <h5><?php echo translate('remaining_package')?></h5>
            <div class="text-left">
                <div class="px-2 py-2">
                    <table class="table table-condensed table-bordered">
                        <tbody>
                            <tr>
                                <th><?php echo translate('features')?></th>
                                <th><?php echo translate('unit_left')?></th>
                            </tr>
                            <tr>
                                <td><?php echo translate('remaining_interests')?></td>
                                <td><?=$this->db->get_where('member', array('member_id' => $member_id))->row()->express_interest;?> times</td>
                            </tr>
                            <tr>
                                <td><?php echo translate('remaining_messages')?></td>
                                <td><?=$this->db->get_where('member', array('member_id' => $member_id))->row()->direct_messages;?> times</td>
                            </tr>
                            <tr>
                                <td><?php echo translate('photo_gallery')?></td>
                                <td><?=$this->db->get_where('member', array('member_id' => $member_id))->row()->photo_gallery;?> units</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Email_model extends CI_Model {
        /*  
        *  Developed by: Active IT zone
        *  Date    : 18 September, 2017
        *  Active Matrimony CMS
        *  http://codecanyon.net/user/activeitezone
        */

        function __construct() {
            parent::__construct();
        }

        function password_reset_email($account_type = '', $id = '', $pass = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $query = $this->db->get_where($account_type, array($account_type . '_id' => $id));

            if ($query->num_rows() > 0) {

                $sub = $this->db->get_where('email_template', array('email_template_id' => 1))->row()->subject;
                $to = $query->row()->email;
                if ($account_type == 'member') {
                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;
                } else {
                    $to_name = $query->row()->name;
                }
                $email_body = $this->db->get_where('email_template', array('email_template_id' => 1))->row()->body;
                $email_body = str_replace('[[to]]', $to_name, $email_body);
                $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                $email_body = str_replace('[[password]]', $pass, $email_body);
                $email_body = str_replace('[[from]]', $from_name, $email_body);
                
                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function status_email($account_type = '', $id = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $query = $this->db->get_where($account_type, array($account_type . '_id' => $id));

            if ($query->num_rows() > 0) {
                $sub = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->subject;
                $to = $query->row()->email;
                if ($account_type == 'user') {
                    $to_name = $query->row()->firstname . ' ' . $query->row()->lastname;
                } else {
                    $to_name = $query->row()->name;
                }
                if ($query->row()->status == 'approved') {
                    $status = "Approved";
                } else {
                    $status = "Postponed";
                }
                $email_body = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->body;
                $email_body = str_replace('[[to]]', $to_name, $email_body);
                $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                $email_body = str_replace('[[email]]', $to, $email_body);
                $email_body = str_replace('[[status]]', $status, $email_body);
                $email_body = str_replace('[[from]]', $from_name, $email_body);

                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function account_opening($account_type = '', $email = '', $pass = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $to = $email;
            $query = $this->db->get_where($account_type, array('email' => $email));

            if ($query->num_rows() > 0) {
                
                if ($account_type == 'member') {
                    $sub = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->subject;
                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;
                    $url = base_url()."home/login";

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[password]]', $pass, $email_body);
                    $email_body = str_replace('[[url]]', $url, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }
                elseif ($account_type == 'admin') {
                    $sub = $this->db->get_where('email_template', array('email_template_id' => 5))->row()->subject;
                    $to_name = $query->row()->name;
                    $role_type = $this->Crud_model->get_type_name_by_id('role', $query->row()->role);
                    $url = base_url()."admin/login";

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 5))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[role_type]]', $role_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[password]]', $pass, $email_body);
                    $email_body = str_replace('[[url]]', $url, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }
                
                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function staff_account_add($account_type = '', $email = '', $pass = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $to = $email;
            $query = $this->db->get_where($account_type, array('email' => $email));

            if ($query->num_rows() > 0) {
                $sub = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->subject;
                if ($account_type == 'member') {
                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;
                    $url = base_url()."home/login";

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 4))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[password]]', $pass, $email_body);
                    $email_body = str_replace('[[url]]', $url, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }
                
                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }

        function subscruption_email($account_type = '', $member_id = '', $plan_id = '') {
            $this->load->database();
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $protocol = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
            if ($protocol == 'smtp') {
                $from = $this->db->get_where('general_settings', array('type' => 'smtp_user'))->row()->value;
            } else if ($protocol == 'mail') {
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
            }

            $to = $this->db->get_where('member', array('member_id' => $member_id))->row()->email;
            $package = $this->db->get_where('plan', array('plan_id' => $plan_id))->row()->name;
            $amount = $this->db->get_where('plan', array('plan_id' => $plan_id))->row()->amount;
            $query = $this->db->get_where('member', array('email' => $to));

            if ($query->num_rows() > 0) {
                $sub = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->subject;
                if ($account_type == 'member') {

                    $to_name = $query->row()->first_name . ' ' . $query->row()->last_name;

                    $email_body = $this->db->get_where('email_template', array('email_template_id' => 2))->row()->body;
                    $email_body = str_replace('[[to]]', $to_name, $email_body);
                    $email_body = str_replace('[[sitename]]', $from_name, $email_body);
                    $email_body = str_replace('[[account_type]]', $account_type, $email_body);
                    $email_body = str_replace('[[email]]', $to, $email_body);
                    $email_body = str_replace('[[package]]', $package, $email_body);
                    $email_body = str_replace('[[amount]]', $amount, $email_body);
                    $email_body = str_replace('[[from]]', $from_name, $email_body);
                }
                $send_mail = $this->do_email($from, $from_name, $to, $sub, $email_body);
                return $send_mail;
            } else {
                return false;
            }
        }
        
        function newsletter($title = '', $text = '', $email = '', $from = '') {
            $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            $this->do_email($from, $from_name, $email, $title, $text);
        }

        /* ***custom email sender*** */

        function do_email($from = '', $from_name = '', $to = '', $sub = '', $msg = '') {
            $this->load->library('email');
            $this->email->set_newline("\r\n");
            $this->email->from($from, $from_name);
            $this->email->to($to);
            $this->email->subject($sub);
            $this->email->message($msg);

            if ($this->email->send()) {
                return true;
            } else {
                //echo $this->email->print_debugger();
                return false;
            }
            //echo $this->email->print_debugger();
        }

    }
    
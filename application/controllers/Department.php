<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function view($slug = "")
    {
        if (!$slug) {
            redirect('post/list');
        }

        $data['title']  = "Post Detail";
        $data['department']   = $this->dept_list->get_post_by_slug($slug);
        $data['dashboard'] = $this->dept_list->get_dept_by_slug($slug);
        // $data['dashboard']   = $this->dept_list->get_dashboard_by_slug($slug);
        // $data['dash']   = $this->dept_list->get_post_by_slug($slug);
        // $data['dashboard']   = $this->dept_list->get_dept_by_slug($slug);
        // $data['selected_department'] = $data['post']->department_id;
        $data['recent_posts'] = $this->post->recent_post($slug);

        public_template2('department/view', $data);
    }

    public function index()
    {
        check_role(['admin']);
        $data['title'] = "department";
        $data['department'] = $this->main->get('department', 'department_id');

        $this->validation();
        if ($this->form_validation->run() == false) {
            admin_template('department/data', $data);
        } else {
            $input = $this->input->post(null, true);

            if ($input['department_id'] == "") {
                $this->main->insert('department', $input);
                setMsg('success', 'department added.');
            } else {
                $where = ['department_id' => $input['department_id']];
                unset($input['department_id']);

                $this->main->update('department', $input, $where);
                setMsg('success', 'department updated.');
            }

            redirect('department');
        }
    }
    
    public function department_list()
    {

        $data['title'] = "Department List";
        $data['dash'] = $this->dept_list->get_table_post();
        // $data['selected_department'] = $data['dash']->department_id;
        // $data['recent_posts'] = $this->post->recent_post($slug);

        public_template2('department/list', $data);
    }

    public function department_dashboard($slug = "")
    {

        $data['title'] = "Dashboard";
        $data['department']   = $this->dept_dashboard->get_post_by_slug($slug);
        $data['dash'] = $this->dept_dashboard->get_table_post();
        // $data['selected_department'] = $data['dash']->department_id;
        // $data['recent_posts'] = $this->post->recent_post($slug);

        public_template2('department/dashboard', $data);
    }

    private function validation()
    {
        $this->form_validation->set_rules('department_name', 'department Name', 'required|trim');
        $this->form_validation->set_rules('department_desc', 'department Description', 'trim');
    }

    public function delete($id)
    {
        check_role(['admin']);
        $where = ['department_id' => encode_php_tags($id)];
        $this->main->delete('department', $where);

        setMsg('success', 'User deleted.');
        redirect('register');
    }
}

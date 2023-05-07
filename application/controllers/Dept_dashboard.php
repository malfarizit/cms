<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dept_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_role(['admin']);
    }

    public function index()
    {
        $data['title'] = "Department Dashboard";

        $data['dashboard']      = (array) $this->main->get('dashboard');
        $data['dashboard'] = $this->dept_model->get_table_post();
        $data['department']   = (array) $this->main->get('department');
        $data['members']    = (array) $this->main->get_where('users', ['role' => 'member'], true);

        $this->validation();
        if ($this->form_validation->run() == false) {
            admin_template('dept_dashboard/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $input['dashboard_link'] = $this->input->post('dashboard_link', false);

            $input['user_id'] = userdata()->user_id;
            $input['dashboard_slug'] = $this->dept_model->create_slug($input['dashboard_title']);

            if ($input['id'] == "") {
                $this->main->insert('dashboard', $input);
                setMsg('success', 'dashboard added.');
            } else {
                $where = ['id' => $input['id']];
                unset($input['id']);

                $this->main->update('dashboard', $input, $where);
                setMsg('success', 'Dashboard updated.');
            }

            redirect('dept_dashboard/data');
        }
    }

    public function view($slug = "")
    {
        if (!$slug) {
            redirect('post/list');
        }

        $data['title']  = "Dashboard Detail";
        $data['dashboard']   = $this->dept_model->get_post_by_slug($slug);
        $data['selected_department'] = $data['dashboard']->department_id;
        $data['recent_posts'] = $this->post->recent_post($slug);

        public_template('dept_dashboard/view', $data);
    }

    public function create()
    {
        check_role(['admin']);

        $data['title'] = "Create New Dashboard";
        $data['dashboard'] = $this->main->get('dashboard');
        $data['department'] = $this->main->get('department');

        $this->validation();

        if ($this->form_validation->run() == false) {
            admin_template('dept_dashboard/create', $data);
        } else {
            $this->save();
        }
    }

    private function save()
    {
        check_role(['admin']);

        $input = $this->input->post(null, true);
        // $input['post_body'] = $this->input->post('post_body', false);

        $input['user_id'] = userdata()->user_id;
        $input['dashboard_slug'] = $this->dept_model->create_slug($input['dashboard_title']);

        $this->main->insert('dashboard', $input);
        redirect('dept_dashboard/data');
    }

    private function validation()
    {
        $this->form_validation->set_rules('dashboard_link', 'department Name', 'required|trim');
        $this->form_validation->set_rules('department_id', 'department Description', 'trim');
    }

    public function delete($id)
    {
        $where = ['id' => encode_php_tags($id)];
        $this->main->delete('dashboard', $where);

        setMsg('success', 'Dashboard deleted.');
        redirect('dept_dashboard/data');
    }
}

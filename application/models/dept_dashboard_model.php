<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dept_dashboard_model extends CI_Model
{
    public function get_table_post()
    {
        $this->db->join('department', 'department_id');
        $this->db->join('users', 'user_id');
        $this->db->order_by('id', 'desc');
        return $this->db->get('dashboard')->result();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 6);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower($combine);
        $preslug = url_title($lowercase);

        $slug = $preslug;

        $this->db->like('dashboard_slug', $preslug, 'after');
        $checkslug = $this->db->get('dashboard');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }

    public function count_data($search = null, $department = null)
    {
        if ($department != null) {
            $this->db->where('p.department_id', $department);
        }

        if ($search != null) {
            $this->db->like('p.post_title', $search);
        }

        $this->db->join('department c', 'c.department_id=p.department_id');
        $this->db->from('posts p');
        return $this->db->get()->num_rows();
    }

    public function get_all_post($limit, $start, $search = null, $department = null)
    {
        if ($department != null) {
            $this->db->where('p.department_id', $department);
        }

        if ($search != null) {
            $this->db->like('p.post_title', $search);
        }

        $this->db->select('p.*, c.department_name, u.fullname, u.avatar');
        $this->db->order_by('post_id', 'desc');
        $this->db->join('department c', 'c.department_id=p.department_id');
        $this->db->join('users u', 'u.user_id=p.user_id', 'left');
        $query = $this->db->get('posts p', $limit, $start)->result();
        return $query;
    }

    public function get_post_by_slug($slug = null)
    {
        // $this->db->select('p.*, c.department_name, u.fullname, u.avatar');
        // $this->db->join('department c', 'c.department_id=p.department_id');
        // $this->db->join('users u', 'u.user_id=p.user_id', 'left');
        $query = $this->db->get_where('dashboard p', ['p.dashboard_slug' => $slug]);
        return $query->row();
    }

    public function recent_post($slug)
    {
        $this->db->join('department c', 'c.department_id=p.department_id');
        $this->db->where('post_slug !=', $slug);
        $this->db->order_by('post_date', 'desc');
        $this->db->limit(5);
        return $this->db->get('posts p')->result();
    }
}

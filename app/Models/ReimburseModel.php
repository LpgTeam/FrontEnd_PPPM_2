
    public function get_reimburse_by_id_status($id_status)
    {
        return $this->where(['id_status' => $id_status])->findAll();
    }
}
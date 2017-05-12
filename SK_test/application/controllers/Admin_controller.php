<?php

class Admin_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'adminM');
        $this->load->helper('form');
    }

    //header view
    public function header()
    {
        $this->load->view('admin/header_view');
    }

    //footer view
    public function footer()
    {
        $this->load->view('admin/footer_view');
    }

    //dashboard view
    public function dashboard()
    {
        $get_client = $this->adminM->get_client_list();
        $get_invoice = $this->adminM->get_invoice_list();
        $this->header();
        $this->load->view('admin/dashboard', ['client' => $get_client,'invoice'=>$get_invoice]);
        $this->footer();
    }

    //find selected client view
    public function clientFind($id)
    {
        $this->header();
        $get_profile = $this->adminM->find_client($id);
        $this->load->view('admin/clientEdit_view', ['profile' => $get_profile]);
        $this->footer();
    }

    //add client view
    public function addClient()
    {
        $this->header();
        $this->load->view('admin/registerClient_view');
        $this->footer();
    }

    //store client
    public function registerClient()
    {
        $this->header();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
            if ($this->form_validation->run('clientRegister')) {
                $post = $this->input->post();
                unset($post['submit']);
                $data['xss_data'] = $this->security->xss_clean($post);
                $result = $this->adminM->addClient($data['xss_data']);
                if ($result != FALSE) {
                    $this->session->set_flashdata('client', 'Client successfully added');
                    $this->session->set_flashdata('classC', 'alert-success');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('client', 'Error adding client');
                    $this->session->set_flashdata('classC', 'alert-danger');
                    redirect('dashboard');
                }
            } else {
                $this->load->view('admin/registerClient_view');
            }
        $this->footer();
    }

    //edit client
    public function editClient($id)
    {
        $this->header();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

        if ($this->form_validation->run('clientRegister')) {
            $post = $this->input->post();
            unset($post['submit']);
            $data['xss_data'] = $this->security->xss_clean($post);
            $result = $this->adminM->updateClient($id,$data['xss_data']);
            if($result != FALSE )
            {
                $this->session->set_flashdata('client', 'Client successfully updated');
                $this->session->set_flashdata('classC', 'alert-success');
                redirect('dashboard');
            }
            else
            {
                $this->session->set_flashdata('client','Error updating client');
                $this->session->set_flashdata('classC', 'alert-danger');
                redirect('dashboard');
            }
        } else {
            $get_profile = $this->adminM->find_client($id);
            $this->load->view('admin/clientEdit_view', ['profile' => $get_profile]);
        }
        $this->footer();
    }

    //delete client
    public function clientDelete($id)
    {
        $get_client = $this->adminM->get_client_list();
        $get_invoice = $this->adminM->get_invoice_list();
        foreach ($get_client as $c)
            foreach ($get_invoice as $i)
        //delete client if existing invoice
        if($c['user_id'] == $id && $i['user_id'] == $id){
            $result = $this->adminM->delete_client_invoice($id);
            if($result != FALSE )
            {
                $this->session->set_flashdata('client','Client successfully deleted');
                $this->session->set_flashdata('classC', 'alert-success');
                redirect('dashboard');
            }
            else
            {
                $this->session->set_flashdata('client','Error deleting client');
                $this->session->set_flashdata('classC', 'alert-danger');
                redirect('dashboard');
            }
        }

        //delete client without invoice
        $result = $this->adminM->delete_client($id);
        if($result != FALSE )
        {
            $this->session->set_flashdata('client','Client successfully deleted');
            $this->session->set_flashdata('classC', 'alert-success');
            redirect('dashboard');
        }
        else
        {
            $this->session->set_flashdata('client','Error deleting client');
            $this->session->set_flashdata('classC', 'alert-danger');
            redirect('dashboard');
        }
    }

    //add invoice view
    public function addInvoice()
    {
        $this->header();
        $get_client = $this->adminM->get_client_list();
        $this->load->view('admin/createInvoice_view', ['client' => $get_client]);
        $this->footer();
    }

    //find selected invoice view
    public function invoiceFind($id)
    {
        $this->header();
        $get_client = $this->adminM->get_client_list();
        $get_invoice = $this->adminM->find_invoice($id);
        $this->load->view('admin/invoiceEdit_view', ['invoice' => $get_invoice,'client' => $get_client]);
        $this->footer();
    }

    //store invoice
    public function createInvoice()
    {
        $this->header();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");

        if ($this->form_validation->run('createInvoice')) {
            $dataI = array(
                'user_id'=>$this->input->post('client'),
                'sum'=>$this->input->post('sum'),
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'identification_number'=>rand(),
                'ico'=>$this->input->post('ico'),
                'dic'=>$this->input->post('dic'),
                'icdph'=>'SK'.$this->input->post('dic'),
                );

            $data['xss_data'] = $this->security->xss_clean($dataI);
            $result = $this->adminM->addInvoice($data['xss_data']);
            if($result != FALSE )
            {
                $this->session->set_flashdata('invoice', 'Invoice successfully added');
                $this->session->set_flashdata('classI', 'alert-success');
                redirect('dashboard');
            }
            else
            {
                $this->session->set_flashdata('invoice', 'Error adding invoice');
                $this->session->set_flashdata('classI', 'alert-danger');
                redirect('dashboard');
            }
        } else {
            $get_client = $this->adminM->get_client_list();
            $this->load->view('admin/createInvoice_view', ['client' => $get_client]);
        }
        $this->footer();
    }

    //edit invoice
    public function invoiceEdit($id){
        $this->header();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
        if ($this->form_validation->run('createInvoice')) {
            $dataI = array(
                'user_id'=>$this->input->post('client'),
                'sum'=>$this->input->post('sum'),
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'ico'=>$this->input->post('ico'),
                'dic'=>$this->input->post('dic')
            );
            $data['xss_data'] = $this->security->xss_clean($dataI);
            $result = $this->adminM->updateInvoice($id,$data['xss_data']);
            if($result != FALSE )
            {
                $this->session->set_flashdata('invoice', 'Invoice successfully updated');
                $this->session->set_flashdata('classI', 'alert-success');
                redirect('dashboard');
            }
            else
            {
                $this->session->set_flashdata('invoice', 'Error updating invoice');
                $this->session->set_flashdata('classI', 'alert-danger');
                redirect('dashboard');
            }
        } else {
            $get_client = $this->adminM->get_client_list();
            $get_invoice = $this->adminM->find_invoice($id);
            $this->load->view('admin/invoiceEdit_view', ['invoice' => $get_invoice,'client' => $get_client]);
        }
        $this->footer();
    }

    //delete invoice
    public function invoiceDelete($id){
        $result = $this->adminM->delete_invoice($id);
        if($result != FALSE )
        {
            $this->session->set_flashdata('invoice','Invoice successfully deleted');
            $this->session->set_flashdata('classI', 'alert-success');
            redirect('dashboard');
        }
        else
        {
            $this->session->set_flashdata('invoice', 'Error deleting invoice');
            $this->session->set_flashdata('classI', 'alert-danger');
            redirect('dashboard');
        }
    }

    public function create_pdf($id)
    {
        $get_invoice = $this->adminM->find_invoice($id);

        if(@$get_invoice->invoice_id == $id) {

            include APPPATH . "third_party/dompdf/autoload.inc.php";

            $dompdf = new Dompdf\Dompdf();

            $user_id = $get_invoice->user_id;
            $get_profile = $this->adminM->find_client($user_id);

            $dompdf->loadHtml("<h1>Invoice PDF file</h1>
            <h2>Title: $get_invoice->title</h2>
            <h3>Identification number: $get_invoice->identification_number</h3>
            <p>Client: $get_profile->firstname  $get_profile->lastname</p>
            <i>Sum: $get_invoice->sum</i>
            <p>Identifikacne cislo organizacie: $get_invoice->ico</p>
            <p>Danove identifikacne cislo: $get_invoice->dic</p>
            <p>Identifikacne cislo pre dan: $get_invoice->icdph</p>
            <p>Description: $get_invoice->description</p>");

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream($get_profile->firstname." ".$get_profile->lastname."-".$get_invoice->identification_number);
        }
    }
}
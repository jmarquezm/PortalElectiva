<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class UsuariosModel extends CI_Model

  {
  public function login($user, $pass)

    {
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('usuario', $user);
    $this->db->where('clave', $pass);
    $this->db->where('status', 1);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1)
      {
      return $query->row_array();
      }
      else
      {
      return false;
      }
    }


  public function get_rol_x_user($rol)

    {
    $this->db->distinct('nombre');
    $this->db->select('*');
    $this->db->from('opcion_x_rol');
    $this->db->where('id_rol', $rol);
    $query = $this->db->get();
    return $query->result_array();
    }


  public function set_users($insert)

    {
    $query = $this->db->insert('usuarios', $insert); //insertamos a la tabla usuarios de una solo vez mediante el objeto enviado
    if (count($query) == 1)
      {
      return true;
      }
      else
      {
      return false;
      }
    }


  public function get_users()

    {
    $query = "SELECT a.id_user,a.nombre,a.apellido,a.email,r.nombre as rol,a.status FROM usuarios AS a INNER JOIN roles AS r ON a.id_rol=r.id_rol";
    $consult = $this->db->query($query);
    return $consult->result_array();
    }


  public function get_user_edit($id_user)

    {
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get();
    if ($query->num_rows() == 1)
      {
      return $query->row_array(); //devolvemos la fila con la informacion
      }
      else
      {
      return false;
      }
    }


  public function edit_users($data, $iduser)

    {
    $this->db->where('id_user', $iduser);
    $query = $this->db->update('usuarios', $data);
    if ($query)
      {
      return true;
      }
      else
      {
      return false;
      }
    }


  public function delete_user($iduser)
    {
    $this->db->where('id_user', $iduser);
    $query = $this->db->delete('usuarios');
    if ($query)
      {
      return true;
      }
      else
      {
      return false;
      }
    }
  }


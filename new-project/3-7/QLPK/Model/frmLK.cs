using MySql.Data.MySqlClient;
using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QLPK.Model
{
    public partial class frmLK : Form
    {
        public frmLK()
        {
            InitializeComponent();
        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void txtUser_TextChanged(object sender, EventArgs e)
        {

        }



        public int id = 0;
        private void btnSave_Click(object sender, EventArgs e)
        {
            string connectionString = "server=localhost; port=3306; username=root; password=; database=hospital";
            MySqlConnection connection = new MySqlConnection(connectionString);

            string name = txtName.Text;
            string email = txtEmail.Text;
            string phone = txtPhone.Text;
            DateTime ngaysinh = dateTimePicker1.Value;
            string address = txtAddress.Text;
            string cccd = txtCCCD.Text;
            string gender = txtGender.Text;
            byte examinationService = Convert.ToByte(cbPTK.SelectedIndex);
            DateTime createdAt = DateTimeP.Value;


            string query = "INSERT INTO benhnhans (name_bn, email_bn , phone_bn, ngaysinh_bn, address_bn, cccd_bn , gender_bn, examination_service, created_at) " +
                                         "VALUES (@name, @email, @phone, @ngaysinh, @address, @cccd, @gender, @examination_service, @created_at)";

            using (MySqlCommand command = new MySqlCommand(query, connection))
            {
                command.Parameters.AddWithValue("@name", name);
                command.Parameters.AddWithValue("@email", email);
                command.Parameters.AddWithValue("@phone", phone);
                command.Parameters.AddWithValue("@ngaysinh", ngaysinh);
                command.Parameters.AddWithValue("@address", address);
                command.Parameters.AddWithValue("@cccd", cccd);
                command.Parameters.AddWithValue("@gender", gender);
                command.Parameters.AddWithValue("@examination_service", examinationService);
                command.Parameters.AddWithValue("@created_at", createdAt);

                connection.Open();
                command.ExecuteNonQuery();
                connection.Close();
            }

            DateTime reminderDateTime = DateTimeP.Value;


            guna2MessageDialog1.Show("Đăng kí khám thành công");
        }




    }
}

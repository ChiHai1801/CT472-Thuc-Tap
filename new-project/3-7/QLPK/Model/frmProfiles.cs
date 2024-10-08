using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml.Linq;

namespace QLPK.Model
{
    public partial class frmProfiles : Form
    {
        public frmProfiles()
        {
            InitializeComponent();
        }

        public void LoadData(string email)
        {
            if (!isClosed)
            {
                // Thực hiện chỉ khi form chưa đóng
                string connectionString = "server=localhost; port=3306; username=root; password=; database=hospital";
                using (MySqlConnection connection = new MySqlConnection(connectionString))
                {
                    connection.Open();

                    string query = "SELECT * FROM users WHERE email = @email";
                    using (MySqlCommand command = new MySqlCommand(query, connection))
                    {
                        command.Parameters.AddWithValue("@email", email);

                        using (MySqlDataReader reader = command.ExecuteReader())
                        {
                            if (reader.Read())
                            {
                                string name = reader.IsDBNull(reader.GetOrdinal("name")) ? string.Empty : reader.GetString("name");
                                string phone = reader.IsDBNull(reader.GetOrdinal("phone")) ? string.Empty : reader.GetString("phone");
                                string ngaysinh = reader.IsDBNull(reader.GetOrdinal("ngaysinh")) ? string.Empty : reader.GetString("ngaysinh");
                                string cccd = reader.IsDBNull(reader.GetOrdinal("cccd")) ? string.Empty : reader.GetString("cccd");
                                string gender = reader.IsDBNull(reader.GetOrdinal("gender")) ? string.Empty : reader.GetString("gender");
                                string address = reader.IsDBNull(reader.GetOrdinal("address")) ? string.Empty : reader.GetString("address");

                                txtName.Text = name;
                                txtEmail.Text = email;
                                txtPhone.Text = phone;
                                txtNS.Text = ngaysinh;
                                txtCCCD.Text = cccd;
                                txtGender.Text = gender;
                                txtAddress.Text = address;
                            }
                        }
                    }

                    connection.Close();
                }
            }
        }


        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Hide();
            //Home homeform = new Home();
            //homeform.Show();
            //this.Close();
        }

        private bool isClosed = false;


        private void btnUpdate_Click(object sender, EventArgs e)
        {
            string connectionString = "server=localhost; port=3306; username=root; password=; database=hospital";

            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                connection.Open();

                string query = "UPDATE users SET name = @name, phone = @phone, ngaysinh = @ngaysinh, cccd = @cccd, gender = @gender, address = @address WHERE email = @email";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@name", txtName.Text);
                    command.Parameters.AddWithValue("@phone", txtPhone.Text);
                    command.Parameters.AddWithValue("@ngaysinh", txtNS.Text);
                    command.Parameters.AddWithValue("@cccd", txtCCCD.Text);
                    command.Parameters.AddWithValue("@gender", txtGender.Text);
                    command.Parameters.AddWithValue("@address", txtAddress.Text);
                    command.Parameters.AddWithValue("@email", txtEmail.Text);

                    command.ExecuteNonQuery();
                    guna2MessageDialog1.Show("Thông tin đã được cập nhật thành công!");
                }

                connection.Close();
            }
        }

    }
}

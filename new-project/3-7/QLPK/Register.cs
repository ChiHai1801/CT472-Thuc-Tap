using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics.Eventing.Reader;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QLPK
{
    public partial class Register : Form
    {
        public Register()
        {
            InitializeComponent();
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            //this.Close();
            Application.Exit();
        }

        private void btnRegister_Click(object sender, EventArgs e)
        {
            DB db = new DB();
            MySqlCommand command = new MySqlCommand("INSERT INTO `users`(`name`, `email`, `phone`, `address`, `password`) VALUES (@name, @email, @phone, @address, @pass)", db.getConnection());

            command.Parameters.Add("@name", MySqlDbType.VarChar).Value = txtName.Text;
            command.Parameters.Add("@email", MySqlDbType.VarChar).Value = txtEmail.Text;
            command.Parameters.Add("@phone", MySqlDbType.VarChar).Value = txtPhone.Text;
            command.Parameters.Add("@address", MySqlDbType.VarChar).Value = txtAddress.Text;
            command.Parameters.Add("@pass", MySqlDbType.VarChar).Value = txtPass.Text;

            db.openConnection();

            if (!checkTxTValues())
            {
                if (txtPass.Text.Equals(txtConPass.Text))
                {
                    if (checkEmail())
                    {
                        guna2MessageDialog1.Show("Tai khoan email da ton tai! Vui long su dung mot Email khac");
                    }
                    else
                    {
                        if (command.ExecuteNonQuery() == 1)
                        {
                            guna2MessageDialog1.Show("tao tai khoan thanh cong!");
                        }
                        else
                        {
                            guna2MessageDialog1.Show("tai khoan da ton tai!");
                        }
                    }
                }
                else
                {
                    guna2MessageDialog1.Show("mat khau khong trung khop! vui long nhap lai.");
                }
            }
            else
            {
                guna2MessageDialog1.Show("Vui long thong tin can thiet!");
            }




            db.closeConnection();
        }

        public Boolean checkEmail()
        {
            DB db = new DB();

            String email = txtEmail.Text;

            DataTable dt = new DataTable();

            MySqlDataAdapter da = new MySqlDataAdapter();

            MySqlCommand command = new MySqlCommand("SELECT * FROM `users` WHERE `email`= @email", db.getConnection());

            command.Parameters.Add("@email", MySqlDbType.VarChar).Value = email;

            da.SelectCommand = command;

            da.Fill(dt);

            if (dt.Rows.Count > 0)
            {
                return true;
            }
            else
            {
                return false;
            }

        }

        public Boolean checkTxTValues()
        {
            String email = txtEmail.Text;
            String password = txtPass.Text;
            String name = txtName.Text;
            String phone = txtPhone.Text;
            String address = txtAddress.Text;

            if (email.Equals("email") || password.Equals("password") || name.Equals("name") || phone.Equals("phone") || address.Equals("address"))
            {
                return true;
            }
            else
            {
                return false;
            }

        }

        private void lbGoSignUp_MouseEnter(object sender, EventArgs e)
        {
            lbGoLogin.ForeColor = Color.Red;
        }

        private void lbGoLogin_MouseLeave(object sender, EventArgs e)
        {
            lbGoLogin.ForeColor = Color.White;
        }

        private void lbGoLogin_Click(object sender, EventArgs e)
        {
            this.Hide();
            Login loginform = new Login();
            loginform.Show();
        }
    }
}

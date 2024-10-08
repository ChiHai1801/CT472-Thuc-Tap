using MySql.Data.MySqlClient;
using MySqlX.XDevAPI.Relational;
using QLPK.Model;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QLPK
{
    public partial class Login : Form
    {
        public string Email { get; private set; }

        public Login()
        {
            InitializeComponent();
        }

        private void guna2Panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            //this.Close();
            Application.Exit();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            DB db = new DB();

            String email = txtEmail.Text;
            String password = txtPass.Text;

            DataTable dt = new DataTable();

            MySqlDataAdapter da = new MySqlDataAdapter();

            MySqlCommand command = new MySqlCommand("SELECT * FROM `users` WHERE `email`= @email and `password`= @pass", db.getConnection());

            command.Parameters.Add("@email", MySqlDbType.VarChar).Value = email;
            command.Parameters.Add("@pass", MySqlDbType.VarChar).Value = password;

            da.SelectCommand = command;

            da.Fill(dt);

            if (dt.Rows.Count > 0)
            {
                this.Hide();
                Email = email;
                Home homeForm = new Home();
                homeForm.AddControls(new frmProfiles(), email);
                homeForm.Show();
            }
            else
            {
                guna2MessageDialog1.Show("Thong tin khong chinh xac vui long nhap lai!");
            }
        }

        private void lbGoSignUp_Click(object sender, EventArgs e)
        {
            this.Hide();
            Register registerform = new Register();
            registerform.ShowDialog();
        }

        private void lbGoSignUp_MouseEnter(object sender, EventArgs e)
        {
            lbGoSignUp.ForeColor = Color.Red;
        }

        private void lbGoSignUp_MouseLeave(object sender, EventArgs e)
        {
            lbGoSignUp.ForeColor= Color.White;
        }
    }
}

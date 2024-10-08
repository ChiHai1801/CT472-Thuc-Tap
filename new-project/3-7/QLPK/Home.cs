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
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;

namespace QLPK
{
    public partial class Home : Form
    {
        private frmProfiles profilesForm;

        public Home()
        {
            InitializeComponent();
        }

        private void ControlsPanel_Paint(object sender, PaintEventArgs e)
        {

        }
        public void AddControls(Form f, string email)
        {
            ControlsPanel.Controls.Clear();
            f.TopLevel = false;
            f.FormBorderStyle = FormBorderStyle.None;
            f.Dock = DockStyle.Fill;
            ControlsPanel.Controls.Add(f);

            if (f is frmProfiles)
            {
                if (profilesForm == null)
                {
                    profilesForm = new frmProfiles();
                    profilesForm.FormClosed += ProfilesForm_FormClosed; // Thêm sự kiện FormClosed
                }

                f = profilesForm;
                profilesForm.LoadData(email); // Tải dữ liệu mới vào frmProfiles
            }

            f.Show();
        }

        private void ProfilesForm_FormClosed(object sender, FormClosedEventArgs e)
        {
            profilesForm = null; // Đặt giá trị null khi form đóng
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            this.Hide();
            Login login = new Login();
            login.Show();
        }

        private void btnHome_Click(object sender, EventArgs e)
        {
            AddControls(new frmHome(), null);
        }

        private void btnCategory_Click(object sender, EventArgs e)
        {
            if (profilesForm == null)
            {
                profilesForm = new frmProfiles();
                profilesForm.FormClosed += ProfilesForm_FormClosed; // Thêm sự kiện FormClosed
            }

            AddControls(profilesForm, null);
        }

        private void btnTable_Click(object sender, EventArgs e)
        {
            AddControls(new frmLK(), null);
        }

        private void btnStaff_Click(object sender, EventArgs e)
        {
            AddControls(new frmLSK(), null);
        }

        private void guna2Button1_Click(object sender, EventArgs e)
        {
            AddControls(new frmTTK(), null);
        }
    }
}

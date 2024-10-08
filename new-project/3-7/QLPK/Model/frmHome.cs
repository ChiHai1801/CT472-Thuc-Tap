using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace QLPK.Model
{
    public partial class frmHome : Form
    {
        public frmHome()
        {
            InitializeComponent();
        }

        private void guna2Button4_Click(object sender, EventArgs e)
        {
            this.Hide();
            frmLK LK = new frmLK();
            LK.ShowDialog();
        }

        private void guna2Button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            frmProfiles ProF = new frmProfiles();
            ProF.ShowDialog();
        }

        private void guna2Button3_Click(object sender, EventArgs e)
        {
            this.Hide();
            frmLSK LSK = new frmLSK();
            LSK.ShowDialog();
        }

        private void btnHome_Click(object sender, EventArgs e)
        {
            this.Hide();
            frmTTK TTK = new frmTTK();
            TTK.ShowDialog();
        }
    }
}

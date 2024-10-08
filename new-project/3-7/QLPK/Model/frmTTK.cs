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

namespace QLPK.Model
{
    public partial class frmTTK : Form
    {
        public frmTTK()
        {
            InitializeComponent();
        }



        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void guna2DateTimePicker1_ValueChanged(object sender, EventArgs e)
        {
            string connectionString = "server=localhost; port=3306; username=root; password=; database=hospital";
            using (MySqlConnection connection = new MySqlConnection(connectionString))
            {
                connection.Open();

                string query = "SELECT appointment_datetime FROM your_table WHERE your_condition";
                using (MySqlCommand command = new MySqlCommand(query, connection))
                {
                    using (MySqlDataReader reader = command.ExecuteReader())
                    {
                        if (reader.Read())
                        {
                            DateTime appointmentDateTime = reader.GetDateTime(0);
                            dateTimePickerReminder.Value = appointmentDateTime;
                        }
                    }
                }

                connection.Close();
            }

        }

        private void guna2Button1_Click(object sender, EventArgs e)
        {
            DateTime currentDateTime = DateTime.Now;
            DateTime reminderDateTime = dateTimePickerReminder.Value;

            if (currentDateTime >= reminderDateTime)
            {
                guna2MessageDialog1.Show("Đã đến thời gian hẹn!");
            }
            else
            {
                guna2MessageDialog1.Show("Chưa đến thời gian hẹn!");
            }
        }

    }
}

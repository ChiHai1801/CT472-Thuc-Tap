namespace QLPK.Model
{
    partial class frmHome
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            Guna.UI2.WinForms.Suite.CustomizableEdges customizableEdges1 = new Guna.UI2.WinForms.Suite.CustomizableEdges();
            Guna.UI2.WinForms.Suite.CustomizableEdges customizableEdges2 = new Guna.UI2.WinForms.Suite.CustomizableEdges();
            Guna.UI2.WinForms.Suite.CustomizableEdges customizableEdges3 = new Guna.UI2.WinForms.Suite.CustomizableEdges();
            Guna.UI2.WinForms.Suite.CustomizableEdges customizableEdges4 = new Guna.UI2.WinForms.Suite.CustomizableEdges();
            Guna.UI2.WinForms.Suite.CustomizableEdges customizableEdges5 = new Guna.UI2.WinForms.Suite.CustomizableEdges();
            Guna.UI2.WinForms.Suite.CustomizableEdges customizableEdges6 = new Guna.UI2.WinForms.Suite.CustomizableEdges();
            btnHome = new Guna.UI2.WinForms.Guna2Button();
            guna2Button4 = new Guna.UI2.WinForms.Guna2Button();
            btnClose = new Guna.UI2.WinForms.Guna2Button();
            pictureBox1 = new PictureBox();
            pictureBox2 = new PictureBox();
            ((System.ComponentModel.ISupportInitialize)pictureBox1).BeginInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox2).BeginInit();
            SuspendLayout();
            // 
            // btnHome
            // 
            btnHome.Anchor = AnchorStyles.Top | AnchorStyles.Bottom | AnchorStyles.Right;
            btnHome.BackColor = Color.FromArgb(50, 55, 89);
            btnHome.ButtonMode = Guna.UI2.WinForms.Enums.ButtonMode.RadioButton;
            btnHome.CheckedState.FillColor = Color.FromArgb(255, 128, 128);
            customizableEdges1.BottomRight = false;
            customizableEdges1.TopRight = false;
            btnHome.CustomizableEdges = customizableEdges1;
            btnHome.DisabledState.BorderColor = Color.DarkGray;
            btnHome.DisabledState.CustomBorderColor = Color.DarkGray;
            btnHome.DisabledState.FillColor = Color.FromArgb(169, 169, 169);
            btnHome.DisabledState.ForeColor = Color.FromArgb(141, 141, 141);
            btnHome.FillColor = Color.Transparent;
            btnHome.Font = new Font("Segoe UI", 9F, FontStyle.Regular, GraphicsUnit.Point);
            btnHome.ForeColor = Color.White;
            btnHome.Image = Properties.Resources.clock;
            btnHome.ImageAlign = HorizontalAlignment.Left;
            btnHome.ImageOffset = new Point(10, 0);
            btnHome.Location = new Point(322, 123);
            btnHome.Name = "btnHome";
            btnHome.ShadowDecoration.CustomizableEdges = customizableEdges2;
            btnHome.Size = new Size(193, 45);
            btnHome.TabIndex = 3;
            btnHome.Text = "Nhac kham";
            btnHome.TextAlign = HorizontalAlignment.Left;
            btnHome.TextOffset = new Point(20, 0);
            btnHome.Click += btnHome_Click;
            // 
            // guna2Button4
            // 
            guna2Button4.Anchor = AnchorStyles.Top | AnchorStyles.Bottom | AnchorStyles.Right;
            guna2Button4.BackColor = Color.FromArgb(50, 55, 89);
            guna2Button4.ButtonMode = Guna.UI2.WinForms.Enums.ButtonMode.RadioButton;
            guna2Button4.CheckedState.FillColor = Color.FromArgb(255, 128, 128);
            customizableEdges3.BottomRight = false;
            customizableEdges3.TopRight = false;
            guna2Button4.CustomizableEdges = customizableEdges3;
            guna2Button4.DisabledState.BorderColor = Color.DarkGray;
            guna2Button4.DisabledState.CustomBorderColor = Color.DarkGray;
            guna2Button4.DisabledState.FillColor = Color.FromArgb(169, 169, 169);
            guna2Button4.DisabledState.ForeColor = Color.FromArgb(141, 141, 141);
            guna2Button4.FillColor = Color.Transparent;
            guna2Button4.Font = new Font("Segoe UI", 9F, FontStyle.Regular, GraphicsUnit.Point);
            guna2Button4.ForeColor = Color.White;
            guna2Button4.Image = Properties.Resources.calendar;
            guna2Button4.ImageAlign = HorizontalAlignment.Left;
            guna2Button4.ImageOffset = new Point(10, 0);
            guna2Button4.Location = new Point(74, 123);
            guna2Button4.Name = "guna2Button4";
            guna2Button4.ShadowDecoration.CustomizableEdges = customizableEdges4;
            guna2Button4.Size = new Size(193, 45);
            guna2Button4.TabIndex = 7;
            guna2Button4.Text = "Lich Kham";
            guna2Button4.TextAlign = HorizontalAlignment.Left;
            guna2Button4.TextOffset = new Point(20, 0);
            guna2Button4.Click += guna2Button4_Click;
            // 
            // btnClose
            // 
            btnClose.AutoRoundedCorners = true;
            btnClose.BackColor = Color.Transparent;
            btnClose.BorderRadius = 21;
            customizableEdges5.TopRight = false;
            btnClose.CustomizableEdges = customizableEdges5;
            btnClose.DisabledState.BorderColor = Color.DarkGray;
            btnClose.DisabledState.CustomBorderColor = Color.DarkGray;
            btnClose.DisabledState.FillColor = Color.FromArgb(169, 169, 169);
            btnClose.DisabledState.ForeColor = Color.FromArgb(141, 141, 141);
            btnClose.FillColor = Color.FromArgb(50, 55, 89);
            btnClose.Font = new Font("Segoe UI", 9F, FontStyle.Regular, GraphicsUnit.Point);
            btnClose.ForeColor = Color.White;
            btnClose.Location = new Point(459, 550);
            btnClose.Name = "btnClose";
            btnClose.ShadowDecoration.CustomizableEdges = customizableEdges6;
            btnClose.Size = new Size(99, 45);
            btnClose.TabIndex = 8;
            btnClose.Text = "CLOSE";
            btnClose.UseTransparentBackground = true;
            // 
            // pictureBox1
            // 
            pictureBox1.Image = Properties.Resources.Screenshot_2023_07_01_180629;
            pictureBox1.Location = new Point(12, 207);
            pictureBox1.Name = "pictureBox1";
            pictureBox1.Size = new Size(546, 337);
            pictureBox1.SizeMode = PictureBoxSizeMode.StretchImage;
            pictureBox1.TabIndex = 9;
            pictureBox1.TabStop = false;
            // 
            // pictureBox2
            // 
            pictureBox2.Image = Properties.Resources.Screenshot_2023_07_01_180747;
            pictureBox2.Location = new Point(194, 38);
            pictureBox2.Name = "pictureBox2";
            pictureBox2.Size = new Size(213, 50);
            pictureBox2.TabIndex = 10;
            pictureBox2.TabStop = false;
            pictureBox2.UseWaitCursor = true;
            // 
            // frmHome
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            BackColor = Color.White;
            ClientSize = new Size(570, 607);
            Controls.Add(pictureBox2);
            Controls.Add(pictureBox1);
            Controls.Add(btnClose);
            Controls.Add(guna2Button4);
            Controls.Add(btnHome);
            FormBorderStyle = FormBorderStyle.None;
            Name = "frmHome";
            Text = "frmHome";
            ((System.ComponentModel.ISupportInitialize)pictureBox1).EndInit();
            ((System.ComponentModel.ISupportInitialize)pictureBox2).EndInit();
            ResumeLayout(false);
        }

        #endregion

        private Guna.UI2.WinForms.Guna2Button btnHome;
        private Guna.UI2.WinForms.Guna2Button guna2Button4;
        public Guna.UI2.WinForms.Guna2Button btnClose;
        private PictureBox pictureBox1;
        private PictureBox pictureBox2;
    }
}
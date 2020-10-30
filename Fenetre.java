import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.*;
import java.util.Scanner;

import javax.swing.*;
import javax.swing.filechooser.FileSystemView;
import javax.swing.plaf.basic.*;

public class Fenetre extends JFrame {
	
	JButton btnSave,btnConvert,btnQuit,btnSelect;
	JLabel lblSave,lblConvert,lblQuit, lblSelect;
	
	final int ZONE_ODD = 1, ZONE_SSODD = 2, ZONE_AUTRE = 3;
	final int CODE_SAVE = 1, CODE_CONVERT = 2, CODE_SELECT = 3, CODE_QUIT = 4;
	
	String[] ssodd1,ssodd2,ssodd3,ssodd4,ssodd5,ssodd6,ssodd7,ssodd8
	,ssodd9,ssodd10,ssodd11,ssodd12,ssodd13,ssodd14,ssodd15,ssodd16
	,ssodd17;
	
	ODD[] LISTEODD;
	String[] LBLODD;
	
	String[] LBLSSODD;
	JComboBox<Object> oddListe,ssOddListe;
	JTabbedPane tabExcel;
	Color FONDDROITE = Color.decode("#9dff9f");
	Color FONDGAUCHE = Color.decode("#d0ffdb");
	Color COULEURBTN = Color.decode("#c2faff");
	
	public Fenetre() {
		super("Defis Impact");
		this.initFen();
		this.initListener();
		this.setDefaultCloseOperation(HIDE_ON_CLOSE);
		this.centrer(0.5);
		this.setVisible(true);
	}
	
	private void initFen() {
		
		JPanel panPrincipal = new JPanel();
		
		this.add(panPrincipal);
		
		panPrincipal.setBackground(FONDDROITE);
		panPrincipal.setLayout(new BorderLayout());
		panPrincipal.add(buildDroite(), BorderLayout.EAST);
		panPrincipal.add(buildGauche(), BorderLayout.WEST);
		
	}
	
	private void initListener() {
		
		btnSave.addActionListener(new BtnListener(ZONE_AUTRE,CODE_SAVE));
		btnConvert.addActionListener(new BtnListener(ZONE_AUTRE,CODE_CONVERT));
		btnSelect.addActionListener(new BtnListener(ZONE_AUTRE,CODE_SELECT));
		
	}
	
	public JPanel buildDroite() {
		JPanel pan = new JPanel();
		
		pan.setLayout(new FlowLayout());
		
		lblSelect = new JLabel("Selection : ...");
		pan.add(lblSelect);
		
		pan.setBackground(FONDDROITE);
		return pan;
	}
	
	public JPanel buildGauche() {
		JPanel pan = new JPanel();
		
		pan.setLayout(new GridLayout(2,1));
		pan.add(buildOdd());
		pan.add(buildBtn());
		return pan;
	}
	
	public JPanel buildOdd() {
		JPanel pan = new JPanel();
		
		File f = new File("src\\odd.txt");
		LBLODD = extraireODD(f);
		String[] numOdd = extraireODD(f);
		int i = 0;
		for (String s:LBLODD) { //boucle numérotation des ODD
			numOdd[i] = (i+1) + ". " + s;
			i++;
		}
		
		oddListe = new JComboBox<Object>(numOdd);
		oddListe.setBackground(Color.white);
		
		oddListe.setUI(new BasicComboBoxUI(){
	        protected JButton createArrowButton()
	        {
	            BasicArrowButton arrowButton = new BasicArrowButton(BasicArrowButton.SOUTH, Color.white, null, Color.black, null);
	            return arrowButton;
	        }
	    });
		
		pan.add(oddListe);
		
		btnSelect = new JButton("Selectionner");
		btnSelect.setBackground(COULEURBTN);
		pan.add(btnSelect);
		
		
		
		pan.setBackground(FONDGAUCHE);
		
		
		return pan;
	}
	
	public JPanel buildssODD() {
		JPanel pan = new JPanel();
		
		File f = new File("ssodd.txt");
		LBLSSODD = extraireSSODD(f);
		ssOddListe = new JComboBox<Object>(LBLSSODD);
		
		return pan;
		
	}
	
	public JPanel buildDonnee() {
		JPanel pan = new JPanel();
		
		
		return pan;
	}
	
	public JPanel buildBtn() {
		JPanel pan = new JPanel();
		

		pan.setLayout(new GridBagLayout());
		
		GridBagConstraints c = new GridBagConstraints();
		
		c.insets = new Insets(0,50,0,50);
	
		btnSave = new JButton("Sauvegarder");
		btnSave.setBackground(COULEURBTN);
		btnConvert = new JButton("Convertir");
		btnConvert.setBackground(COULEURBTN);
		
		pan.setBackground(FONDGAUCHE);
		pan.add(btnSave, c);
		pan.add(btnConvert,c);
		
		
		return pan;
	}
	
	public String[] extraireODD(File f) {
		try {
			
			Scanner s = new Scanner(f);
			//Considère qu'il y a 17 ODD
			String[] liste = new String[17];
			LISTEODD = new ODD[17];
			
			int i = 0;
			while (s.hasNextLine()) {
				
				LISTEODD[i] = new ODD(s.nextLine(),i);
				liste[i] = LISTEODD[i].getRep();
				i++;
				
			}
			s.close();

			return liste;
			
		} catch (FileNotFoundException e) {
			
			System.out.println("Le fichier n'a pas été trouvé");
			e.printStackTrace();
		}
		
		return null;
	}
	
	public String[] extraireSSODD(File f){
		//on considère 143 sous ODD
		try {
			
			Scanner s = new Scanner(f);
			String[] liste = new String[143];
			int i = 0;
			while (s.hasNextLine()) {
				liste[i] = s.nextLine();
				i++;
			}
			s.close();

			return liste;
			
		} catch (FileNotFoundException e) {
			
			System.out.println("Le fichier n'a pas été trouvé");
			e.printStackTrace();
		}
		
		return null;
	}
	
	public void centrer(double d) {
		Toolkit tk = Toolkit.getDefaultToolkit();
		Dimension dim = tk.getScreenSize();
		int largeur = (int) (d * dim.width);
		int longueur = (int) (d * dim.height);
		this.setBounds((dim.width - largeur) / 2, (dim.height - longueur) / 2, largeur, longueur);
	}
	
	class BtnListener implements ActionListener {
		 
		private int zone;
		private int code;
 
		public BtnListener(int z, int c) {
			this.zone = z;
			this.code = c;
		}
		
 
		public void actionPerformed(ActionEvent e) {
			
			switch (zone) {
			
			
			case ZONE_ODD: {
				System.out.println("ODD numero " + code);
				
				break;
			}
			case ZONE_SSODD: {
				System.out.println("Sous ODD numero " + code);
				
				break;
			}
			
			case ZONE_AUTRE:
				switch (code) {
				case CODE_SAVE:
					System.out.println("Je sauve");
					
					JFileChooser jfc = new JFileChooser(FileSystemView.getFileSystemView());		//on instancie un JFileChooser qui affiche l'explorateur de fichier
					
			        jfc.setDialogTitle("Veuillez choisir le dossier de destination : ");			//le nom de la fenêtre
			        jfc.setFileSelectionMode(JFileChooser.FILES_ONLY);								//avec le FileChooser, on cherche un fichier de destination

			        int returnValue = jfc.showSaveDialog(null);										
			        if (returnValue == JFileChooser.APPROVE_OPTION) {								//on cherche à savoir lorsque l'utilisateur a appuyé sur OK
			        	if (!jfc.getSelectedFile().getName().endsWith(".txt")){
//			        		modele.sauver(jfc.getSelectedFile().getName()+".txt");
			        		System.out.println("");
			        	} else {
//			        		modele.sauver(jfc.getSelectedFile().getName());								//on prend le nom que l'utilisateur a saisi
			        		System.out.println("");
			        	}
			        }
			        
			        break;
					
				case CODE_CONVERT:
					System.out.println("Je converti");

					break;
					
				case CODE_SELECT:
					
					int ind = oddListe.getSelectedIndex();
					System.out.println("Je selectionne : " + LBLODD[ind]);
					lblSelect.setText("Selection : " + LBLODD[ind]);
					
					break;
					
				case CODE_QUIT:
					System.out.println("Je quitte");
					
					break;
				default:
					break;
				}
			default:
				break;
			}
		}
	}
	
	public static void main(String[] args) {
		Fenetre fen = new Fenetre();
		
		//TEST EXTRACTION FICHIER
//		File f = new File("src\\ssodd.txt");
//		String[] ssodd = fen.extraireSSODD(f);
//		
//		for (String s:ssodd) {
//			System.out.println(s);
//		}
		
	}
	
}

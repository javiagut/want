PGDMP          9                z           want    14.2    14.2     C           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            D           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            E           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            F           1262    21688    want    DATABASE     `   CREATE DATABASE want WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE want;
                admin    false            4          0    21890 
   categorias 
   TABLE DATA           a   COPY public.categorias (id, categoria, id_cat_padre, estado, created_at, updated_at) FROM stdin;
    public          admin    false    212   ?       2          0    21847    clientes 
   TABLE DATA           �   COPY public.clientes (id, nombre, apellido1, apellido2, email, contacto1, contacto2, nacimiento, rol, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          admin    false    210   �       6          0    21906    colores 
   TABLE DATA           D   COPY public.colores (id, color, created_at, updated_at) FROM stdin;
    public          admin    false    214   
       >          0    21964    pedidos 
   TABLE DATA           `   COPY public.pedidos (id, id_cliente, estado, sesion, total, created_at, updated_at) FROM stdin;
    public          admin    false    222   �       @          0    21980    detalles 
   TABLE DATA           ]   COPY public.detalles (id, id_pedido, id_stock, cantidad, created_at, updated_at) FROM stdin;
    public          admin    false    224   �       :          0    21922 	   productos 
   TABLE DATA           �   COPY public.productos (id, nombre, marca, descripcion, id_categoria, rebaja, rebaja_inicio, rebaja_fin, estado, created_at, updated_at) FROM stdin;
    public          admin    false    218   ~       8          0    21915    tallas 
   TABLE DATA           C   COPY public.tallas (id, talla, created_at, updated_at) FROM stdin;
    public          admin    false    216   D!       <          0    21938    stock 
   TABLE DATA           �   COPY public.stock (id, id_producto, id_talla, id_color, sexo, precio, stock, ventas, foto1, foto2, foto3, foto4, foto5, created_at, updated_at) FROM stdin;
    public          admin    false    220   �!       G           0    0    categorias_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categorias_id_seq', 80, true);
          public          admin    false    211            H           0    0    clientes_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.clientes_id_seq', 3, true);
          public          admin    false    209            I           0    0    colores_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.colores_id_seq', 11, false);
          public          admin    false    213            J           0    0    detalles_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.detalles_id_seq', 205, true);
          public          admin    false    223            K           0    0    pedidos_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.pedidos_id_seq', 105, true);
          public          admin    false    221            L           0    0    productos_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.productos_id_seq', 15, true);
          public          admin    false    217            M           0    0    stock_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.stock_id_seq', 20, true);
          public          admin    false    219            N           0    0    tallas_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.tallas_id_seq', 24, true);
          public          admin    false    215            4   L  x�uT�n�0</�B?��OQ�uZ4i�H�/��*d�Уh>��So��ǺD�ؒ�9�˙]1�X��o�?MUXX����!.�aW5���tr��k�i}w 9�|Ał��3C������z|.��v�����[�g��m�\ٶ���:7\&	�p�\;>Oe��a;��uAjp[?��8�>V>�s�w�LdVmihJ���o:�OA�CU:�c&=�Ij� ,�k_�����m������۹��>X��n(m�Z�zpT�	l�pÈ�����o|��3�nB�	�F2�I�U�Mr�l#ԥ��S�������-����'h�(�$M�y��n�݇�`2���0�j�mK��ҷ�w���HӨ�PL$L���P+��
�:P�p>'JÖ$]B^ۧ����o@��q�e0�)�U�&�·��u�%Ĝ�{��p<�L��9�5�aDK�ǉ�Yu�1s�!S�R���6�C$�`2	��f1�d4��s4�bQ>��7��z�c��$L�D�^���<^Ϸ����֗C�qo[�\ۮ���{��.@�[�a����U9&E����v������>3gse�#�w����Z�      2   _  x�m��n�@F��St�:s��V"��5�Vm���EE����G�u�]�hrsor����#(����z�����&�²�m	�L
�c���4�T5�k��m����|����H#��|��Z�T�"�*�q���|�����_e��M��;�P�[L�ȗ�D��XѰ��(U����hs6�6#Դ KXL�3��m�S6Q���v//��Ns<����0��벤��dQ�y2�z���p�U��ߗ~n��T��쎘e�[L�>#�!wY��W
�t�)UG���0�	���\�S�`�$7ͽh"��X�)��[5�/���O�塻)]���x�v>u
�W%;Lh3CӴ� ��      6   h   x�3�t�I�K���".#N���"Ϙӱ�4�1��ςɘr:�&e���̀�ŉP�9�Of�c��Z��
�Yr�%%�e�d8}��o΃
��qqq ��'�      >   N  x�mлr�@ ��zy
_@gw�oP$�(2iA�����؞��#� nDOiG�3��g]\�Y¯����S���g�;C���� �r9���2��1����DX���`�x�aF�zŮ��V��Oiyk���ghe�%�:��
J��^t���f	� �:H!D��BAF{�<E��r�>��P��������w��M�!U�gW�a͍M(�@&2���#�,�Ed��DE�F�5�Z�e���m;K��L*�RwWj[�Q/mmiQ �!���~��
Ћbz�1[ooU����ݮ��U�QQWIs'MN�1&����'Xx�1?�a~1���      @   �   x�m��1�P�6�<��%���Cb'H�2h� �����#pK���/�d��u2���](��M~�����r��o�e,��K���p�rf�ԿyߌՄF�#f^�^c�1���?��w���=gc!����O��g��f~�J�      :   �	  x��XMs�8=K����J�R�vt�Rl��YE�H�L�T.	��$]v����s��Tn{٪��� HQ6c�f���@w����g<�i�Y ؖ�*�E�)�����R�6�����,j76\G�_�~�Z0?�g	ל��܊X��/�0Si˽�w\3V�1w��R��Z0~��>W�_���3�UR�k�5�$FxJf;����ǘ�&��_k����,�9��EhV�y(�ԛ\��i�K��Yș�E`�1v�6��� �O�K��z�����ETB���g��U̸V�-��Ìvcp��8w��ht�n����������ݺ�f��������L�Xg"�#�U���Uw8`����1���/�L�q!������5��� �f�VA�c���dX�%�E�2�-��RH&���K$}^���)�1ˀ�'��ap�B�A�E�D��V�<���h��2+)<���1����H�h��8����u���E*a6��fK�����E�ڸ`��3,�|����t~�C��F^g�=�k����]h�\�2Xo��]�E�>,��r��5T2�Ҧ��o�nvEq��3�l�ԧ ���)��O��	D��&�KHf�Ѿu6	e"�|�Y&P�B�e��]I��k,�S�ע�
�g����U�~~��V�bl�(���Xt:(���f���p9ٌ���m&��ͧ�_kJ��Ǻ��<-[�V*	$=�Z�.A���Ǵwp��)��H�J���]�;_t�~d�ǚ�'%H.�AC�If��`KJ�꫐o�v	L��f2	��q�H�D��E1���5�¯�k����lc�� ��&�N/-#Aq��3��h+�����z���hl8�G�a��������gl�k��5"�f�d��^7&U`
���\\�����Z]�)qS���sq˿j/P�?Xڥ0T�CY(���{�^��F�T�%��;���u��W&�X�j��͒1ϩQrZũtl(�"��e��OS�.E0���EH�-o�(�)��xl�,|�	Dׯk^�o�L�8����h?l�9�Z����U����{:`��e3
�N�V'Sh$�[�z��&�l��͋�@��4HeR��}=e�g#�k��=�ⷊ�JLy����!�9A�	TU_�*Rl��
��|=[�Xs���'<�ah�lܬ:�c�t�t儛�T�`ɤVN����|���0�
7�!N�<�IWĶ�g΄4G\a�HK`�}�۔��v$�;b1�b�54r���Kl"��O�Q����r,*�\Pq�����]�Nz������y��I-N� \zO�"~�a�q�t�ZpLP�[�������(��ZP�Z�u=�c��r��L�d�&3v��M.�)���h%*9��VMk�?f�(�͸$�J�
�� ��G�O�r�I߱�"�C@�_��w&���p�1���aZ���Z��(1`�59G`�J�{�Ag�̞f�y��y�o���x}P,���9��~�8�o�v6���1ec�8{�����e���S�-ݰ�߽�L8A�!v���7T�%~[t�*��0������6��Dq��M~8&��%Mˌ��gr��Z^���H��S�T{�
g�
����Ȑ�0�g�q �Z�R�~f<��/T�`XS�4�|�8����-'���9�P�ۼ{��p�c��wP�w�?%=T�m�`�D 
&Џ�eӧ�IJ>��rڑ��6Τ�M�e��fO��v �*���m�2k��T@�K�(�x�������8&�"���&&� pQ��i^=�k�U�B�x��E�n�(���c3Vb�P�v^�`��S$�>�*0���7]��Ӛ���f�kh���t�^���-� ��>p�Y-f��d����,1� ��*J��Wp�< qRu(��1��\򬺛��^�Tި�H�PH�iq��d�+���UE�w%!�l���<��aύ5;E�:]�}��O/?�w����,��X�Ǘ��5�����Dj���"2`�4�"�.%��t����	�7��׌5;��RY�u,�W���r�v���M]��c��)+K���z+�>�CW���tP�7��oX}C�7#�)�20z�Hmn��S����xE�Q9P鬺0�wh�/��7�ԍ5;=0��l���'��yCy5fg����M� �������^����r�&���H�,u� ��Q�t������4�$3����*���x1�5v���+-3��E�^��T`�)x
���T�����sv4��˴23���o+���Xe��Zb�r��6[h�8�U����{��o�X�~���J�3����fpZ���Z��YО[����2����~Lg�a�*�ڜ�s��Y�Pa=��6kR��6{W�^����D#@;aO*f&6�+��\m��Ez�U�D�0�`��FK��w{o����2:8䚰8��ܼp�LNpz�k~l7����^Q      8   �   x�=ͻ1D�x\ ��� ���&ҊIi�<H�dts����y����X0�q_v�IHץ��R���;</�/r�W��Mvx�	F9�I.��t���;��EP]K��f��栺Fdu�s�wY;�      <   �  x���1n#1Ek��@�"5�n7M�4)v�I���/ɱǞ� ��6@�| ���%���{f��>�����-UY*^*��2�]�;��
)�E#<�f��(�!ɑ��)w2��EFZ�P�C�}g�?�>?�������E^i�"-55��VG&�<گ�����6�R��'�pH�ah�Y�طZW�d��gF��B�?@�Ju�%$�5{�ؑ%;u/RXi;dh	4Gb�2���椸=�В�����f��I�)Z����b�����v�s[�wg�+��Nv?�W�%��y?5�c���s=֞��HK�5,O���z�����Ì􊖪,���i�GZ2��i�R�9�fx�tm�������q	�9`߰����4� 4c�-^�~
c�G�=��}�"nX��~wOۜ�*uF��蒹D��-p-��~z�:s�v`��f*����S��R���(     
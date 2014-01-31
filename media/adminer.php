<?php
/** Adminer - Compact database management
 * @link http://www.adminer.org/
 * @author Jakub Vrana, http://www.vrana.cz/
 * @copyright 2007 Jakub Vrana
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
 * @version 3.7.1
 */
error_reporting(6135);
$lc = !ereg('^(unsafe_raw)?$', ini_get("filter.default"));
if ($lc || ini_get("filter.default_flags")) {
    foreach (array('_GET', '_POST', '_COOKIE', '_SERVER') as $X) {
        $lg = filter_input_array(constant("INPUT$X"), FILTER_UNSAFE_RAW);
        if ($lg) $$X = $lg;
    }
}
if (function_exists("mb_internal_encoding")) mb_internal_encoding("8bit");
if (isset($_GET["file"])) {
    if ($_SERVER["HTTP_IF_MODIFIED_SINCE"]) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }
    header("Expires: " . gmdate("D, d M Y H:i:s", time() + 365 * 24 * 60 * 60) . " GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    if ($_GET["file"] == "favicon.ico") {
        header("Content-Type: image/x-icon");
        echo
        lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");
    } elseif ($_GET["file"] == "default.css") {
        header("Content-Type: text/css; charset=utf-8");
        echo
        lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7������Fé��a�'3I��d��!S��:4�+Md�g���ǃ���t��c������b{�H(Ɠєt1�)t�}F�p0��8�\\82�DL>�9`'C��ۗ889�� �xQ��\0�e4��Qʘl��P��V��b���T4�\\�W/����\n��` 7\"h�q��4ZM6�T�\r�r\\��C{h�7\r�x67���J��2.3��9�K��H�,�!m�Ɔo\$�.[\r&�#\$�<��f�)�Z�\0=�r��9��jΪJ��0�c,|�=������Rs_6��ݷ�����Z6�2B�p\\-�1s2��>�� X:\rܺ��3�b����-8SL����K.�-�ҥ\rH@ml�:��;�����J�0LR�2�!���A��2�	m���0eI��-:U\r��9��MWL�0�GcJv2(��F9�`�<�J�7+˚~���}DJ��HW�SN���e�u]1̥(O�LЪ<l��R[u&��H�3�v��U�t6��\$�6���X\"�<��}:O��<3x�O�8��>����C���1����HR��S�d�9��%�U1�Sn�a|.�ԁ`�8���:#���C�2��*[o��4X~�7j�\\���6/�09�\r�;��;V�n�n���މv��k�HB%�.k\">��[�\n���l��p�9�cFZ�s��|�>6 �5�l1V��ΐ�6����7��:�\"Az��de���\\�5*�մ��]�p[*�Am)Kt[�\n8g=;���2z���|���̣4�t8.���N#�ʲ��B\"�9���%���HQw�qd��F����\$&V��Q#�Q'��_�m�̡�� ���\r��h� Xrt0j5����W���4���ד�m����\"CA�F!�엖h>�b0�0�7;8�4Ka���	\0�p	a���HXF��1:�8�U9H��Ió�;�sQ�7F��cLpXM@e�����吞+g(��73O�3p��b�lEE>�Chb%�D�I8��E'�	#)�=%C��j�Y�1��y�h;cA��6�jK�\r���9�\$|������g-Z�o�\0���z���\$+D���V�w*�W��p�J���\\�F�O�'ɲa1�m,_ڧ\r��1�P�o�;\0�5����e\r& 3��^\r��6�MR2T\0���5?~�5����P>�85h��n�1;��\rRL8`�\\��@��`;z\n�\0�ԃ8��9R�yZP@�ib�?ƭv\$�<�%	A\r�?�\0�Sʥ��� �BÞ4JҨ��:�`#Hi�7ε�+}���v���o�J��Vڰ���9���W�2�Q�\r�T�D`��f�� ��w�L�����I]MKd7*rk*j\nAS��jF��-[ezz�r��ʁfU�3��~\\��Z��Z��{)��>>Ѓp���*����;zDb�w��]�mC\n���訓�KB��B���m@�����ִ>�����wU�*N�(ba�ƶ�@f�v�)��`�\0u�D)mD@/4����9j������HBm1��I��5D��RuE��9��Aӗ=1b�0��e�y��1��s�;��������-�����]s��5�\\��\n1;���Q�^��b��i�;YJ2�d!s����#�kg�hށ]�W)>V��I�x]�r���;6�JLcpr��d{py�M��-�UVH�5'\nt��в�l���pH���o�e�Z�Ϩ��q�e��X�F�`Gy\r�!�Ww*����D��u�t%���d�Q��/�p�:�ih���t&���P��e,J͌��t�!�O�7��6�GgR���C[��sk�vqU�}y�h�AGV�����|�lF�ޅL^�.��]u&w�!��[jn��n��ڏ[k�C��v����k�rmOɭ��J>��WT�0����\n�pM�C�b�t��VG|oy8����c�����");
    } elseif ($_GET["file"] == "functions.js") {
        header("Content-Type: text/javascript; charset=utf-8");
        echo
        lzw_decompress("f:��gCI��\n:��sa�Pi2\nOgc	�e6L����e7�s)Ћ\r��HG�I���3a��s'c��D�i6�N�����2H��8�uF�R�#����r7�#��v}�@��`Q��o5�a�I��,2O'8�R-q:P��S�(�a��*w�(��%��p�<F)�nx8�zA\"�Z-C�e�V'������s��q��;NF�1䭲9��G�ͦ'0�\r���ȿ�9n`�р�X1�݁G3��t�ee9��:Ne��N��OS�z�c��zl�`5����	�3��y��8.�\r���P��\r�@����\\1\r� �\0�@2j8ؗ=.��� -r�á��0���Q�ꊺh�b����`����^9�q�E!� �7)#���*��Q���\0���1���\"�h�>��������-C \"��X��S`\\���F֬h8�����3��`X:O�,�����)�8��<B�NЃ;>9�8��c�<�#0L����9���?�(�R�#�e=���\n���:*��0�D��9C���@��{ZO����8��i�oV�v�k�Ar�8&����..��cH�E�>�H_h����WU�5��1�r*����^�(�b�xܡY1���&XH�6�ؓ.9�x�P�\r.`v4�������8�4daXV�6�F���E�HH�fc-^=���t��x�Y\r�%��xe���Q�,X=1!�sv�j�kQ2��%�W?��Ů���=�dY&ٓ�VX4�ـ�\\�5���Xì!�}��N�gvڃWY*�Q��i&��l��ѵZ#����Ց\rA�\$e�v5o#ޛ���5gc3MTC�L>v�H����<`��*�]�_��;%�;��V��i�����4X��'��`����i�j0g�O��ۥ�i���9�ƙےd�F���k/lŞ��n��c<b\n��8�`�H��e�}]\$Ҳ��� �!����C)�\$ ��A��`�\0'���&\0B�!�)���5E)�����o\r��8r`���!2�T��s=�D˩�>\n/�l�����[�ŠP��a�8%��!�1v/��SUcoJ�:�4J+�B���v�J�\r���b{��,|\0��z��c���Y��l�\n�i.��!��)�dm�J����!'��� B\nC\\i\$J�\"���2�+�IkJ���\$����G�y\$#ܲi/�CAb��b�C(�:��UX���2&	�, Q;~/��Ky9��?�\r6��tV���!�6�CP�	hY�E�������l�䏞(ؖT��p'3��C<�dc���?�yC���e0�@&A?�=��%�A:JD&SQ��6R�)A���b`0�@��u9(�!0R\n�F ��� �wC\\����υr��ܙ��#�~��2'\$� :��K�`h��@��Eb�[�~���� T��lf5��BR]�{\"-��\0��L>\r�\$@�\n(&\r��9�\0vh*ɇ��*�X�!_dj�����py������`�jY�wJ�\$�R��(uaM+��n�xs�pU^�Ap`ͤI�H�\n�f�02�)!4a�9	����EwC�����˩ �L�P����Ai�)�p�3�A�u����AI�A�Hu	�!g͕�U����ZU���c�*����M��xf�:��^�Xp+�V�����K�C#+� �Wh�CP!���;�[pn\\%��k\0����,ڨ8�7�xQC\nY\r�b��XvC d\nA�;��lF,_wr�4RP��HA�!�;��&^Ͳ��\"6;����=�#C�I���9f�'�:��DY!��B+�s�xV��8l�Ó�\"�鑃�H�U%\"Z6��u\r�e0[��p���a��.��� +^`�`b�5#CM�\$� �I��˚A�P�5C\r� S�d�WN6H[�SR�����\\+�X�=k��λ׺��S����r^(��oo�7����\\huk�lHaC(m����nRB��Uup��2C1�[�|ٽ�beG0��\"�CG��?\$x7��n��\$Z�=�ZӦ��si5�f��&�,�f�hi�I�y��n�2�0��DvE��T�x��M�{��`ܤ�GN#遂Z,�/�R\$�#\\I-	����|�0�-0�N�P�����;s-�v���҆���nwGt�n����di�H�|��4�(��+�v��&�Ņ�+K����L\nJ\$ԩ�:\\Q<WB\"^���WTIB~��q�ɞ��}�3�ο\":�U����|\r5n(n����� �7��O�D}B}�����\0\r�voܕ���؆_Jl�İ�H3�\"�[ĸ���K�A��`ߖ�N���&(�)\"� f�&�\0�� b��l��F�.jr����J�\"P<\$F�*�|f/�! �O��pR ���F#5g�b���8eRDi��0�P�+*�������k�Z;�pHh��l!�\0\r\nc�o�/��CB�<py�NTH�h�T�	�@��px�\$������48\n��#�NU,���\$P�m��YK�\"H�� �R�L��D�\0����a�W�`p�����g���lP����o�:L���+\0 ]0�<)��N�xk\n(`c�+r�k{m\"�3.0��H1�e*ZoeB���9\r���\0RLi�Q�U�ԋ`��.����o:�d���T7Q��V ��Dh��W��S1�	��g�*2��,�W)��@�ϰT@C	Q(�,��4�#d<��\0�! �\$��2 {es��+�rʫ����JvY*�HPr\r����T�M\\\\`���v���<�&�n�D\\HH�oj^@��	��<񊆯��8��*#f�*��\r\nT� \\\r��*�T�^*��ɠ�\$�6o�7��Ree8� �粡,ҥ,�,`|9��K2�0r�+ҧ1R��\"� �*�P*��ȆM\\\rb�0\0�Y\"�\"�Ux���`������Q�E\r�~Q@5 �5sZ�^f�R@Q4�d��5�b\0�@�F�b/�8\"	8s�8�<@����l2\$Sh���\n�R\"U�43FNɫ7\"D\r�4�OI3\n\0�\n`�``��� Y2��ob�3��<n6�]<`��\"�� N�\"B2�Z\n��m���E�����\0����Zx�[2�@,��<P�?�\r�8#d<@��JU��K/E�;\$�6��S�DU	l;�,U�LΒ�7fcG\"EG��\$��\"E��3FHƤI���d�=e	!�UHБ23&j�Ȭ�*��%%�%2�,��JQ1H�l0tY3��\$X<C�t�4�_\$\0��>/F�\n�?mF�j�3�p�D��HK�v Ⱥɜ�\0X�*\rʚ��\n0��e\n�%��\ri���O��fl�N��M%]U�Q�Q�L�-��S±T4�!��U5�T\nn�di0#�E��M����i�.��/U���\rZF���j���;���H�☎d`m�ݩ��\n�t��QS	e��|�i����Qt� d�12,���DY�1UQSU��cd����E�)\\����L�	�F\$�@��V�{W6\"LlT��A�\$6ab�O��dr��Lp�c,��esΞ�<2�`�@b�XP\$3�����@˃P,�K�Vխ^����M��L���u�1��@�c��t-�(���`\0�9�n��2sb���/ �Fm�)���Hl5�@�n�l\$�q+�:��/ ���d��,��\n�޵�����.4�\$ �w0\$�d�V0���\"��r��W4678�VtqBau�pÀ�I<\$#�x`�wd�9�^*k�u�ofBEp	g2���f4 ��L!�r=�\0��\"	�\r<��h�������U�%T�h��Bk�#>�'C�p\n��	(�\r��2����\"3�l��Mԋ7�G�x.�,�Uu�%Dt� �w�y^�Mf\" �����(vU�3�u��J^HC_IU�YkS���c_ylc�c]rF���_q�%�W#]@�r�kv�3-�cy��VHJG<�Z��T�@V�8�\$�6�o�2H@�\r��ª\0��=�ݍ���\"3�9z��:K����u��K >����B\$�r�.�J��<K�G~�P�X��QMƹ	X��w\$;��mp�Zp�� �cK!OeOO�?�wp��懤�֠��L��I\n��?9xB�.]O:V����9��.�mW�\0˗s>�*�l'���k��o�ph���x�����v�L`w�1��� ��!�M�4\"�I\$��\"o�\$��>˙Bea\"��D�Bo�ʶ�+� B0Pxp��&��7�|p{|��}7ְ�\$-P�����@b����e����VYmoM�o�\0���Nzn*>�΄�)�����-H�l!����hp�g�� ����&tZ�㜤\0�!��8 ɩ���ZK��@DZG��������F�秩.� ��l��z%��(�x�}��'<��Ū(�����<�XZǬ��њ� ɮg��?��w��z�z{�e�'{;@噱(&���R�^E�ݛx�宛Y��\"���Mܒ��V��\n�5�zl�zr�[x��˪����G\$O�W�@����Z�x�����,����be�� 	�f�dƻ�2��EË��I�D�YT�%�k�{�J�\\\r�U N �'�_��ɽ�f|w޵����,�l�7�kt�1R�D>�ЋX�Z��Њ�|y|Z{|�բ��\r��%;�#\0eZ,\rKt\r�>��>\$�>��?�?c�?�+��@�� ���@ʰ���c�q�fc��+�3Ș���؀&x�]�N���*|��b2<lnT��\$�A��Z0.��&��˷��`{�p,�@��&|��ϖ.��.oo��@����1=\$9{��dB;���ה#�:��\$@wң�=���C?� �(�?Ӄ� �G1�|�\"]�\0���5�\0Ej\r��@@*�2KL�#d*��CA�3,K`� ��C��ϭ�������]��\r�L9۝��=<��]�(�jC�) �,���Bf\r��� �-�Rd5��\$\0^�\n4�\0�ڢ��SY�܆�k���4��@�B\0���W��?x(��u}��ڠ�����K~P\r���/�E\"���#��>R�_���\$< ��\r�l�[����*�`�\n����~��b��]���j�B\r�qˣQ꾼+�(�W|���+�ep9�j}R<�w@���db̴�����Qդ��̀�/(稦m��I_�}U<��ո�ЗBy�����_�f�&F͌��F.} zh��y���Fc���rU۫Fq���:�\n��\n%���`��D@�{��������s/wh]Bz\"J��#���f������TC�����_��dZؠ�֣m2n�nC��K�G\\9(�B�o�� ���S�#��|���d)E��ހ�|��,��bg�1�N�1u�P91�\0��T\0�<�p>iJ����6p\r-���S0�t��HJ�`�7Dc���p)�\nߢ\\����%�a���Q� �C�f���������6\n�e���\n>�@%h�%I	�`�\0�uAX�K��	`�8+��I\\(�\rń�\0�l�H#]*y\$���,H�?E�F�C7�`țE@rG�p�LB3H,�0�+�s\r\0�\0�!�9�Hua4��� �0�aJ�(�\0��Dq�g��aJ!��m~A�a&à�/ *p��\"�I��BD�\r!�9!v�L�:��Ċ�!\$��A�K����e��\0�l�b	i��6%�YzKrlRK�\"AF{ 6��XH�&�:h~��9��_�2Ws>���\$�Ћ���� ���p�C@vz�0����և8��\\�v���p:s_\\��:��Y\rB����\$|���i�G���R#�	YR9�\0D28?��+}Y���ᩇJ#�C�iV�CT6�Q9���pite�L��p\$�4�\$D#�@@��<A��Pܑ��\0�f�!����а�)B2YZ\0�.���S��(����.� 4b1�H��`س�Y)��R�Ă�`1�g����H:B]�O#8�K���\n�jD%C*I\$Ai���N,�0	 K(\0�T�`\n2OB7����4Q�CH	��4@��� )\$\0	�Jq���+��K�e��&.�J'p�=p��Q�����[xXb� <E�'D�#���`3����60@@�ڦ�� `|�R쀾�5��.�� ����?#?�lS\"!�jE��q�\0�� ���Q���\r�T#<��?1��(HB��FL��[|�@LE�܆�&Q�:yĎ���Fh4q�����U���\"!C1��FJ8#@��f:dё8#2C�8�2.\$�Cb��|\$�0���r�I\0��,��00�K�e!�N��i@d|�5��h`��	T��U2Nj��i��0�Udk��*&j�F8*�E����zcά��Ηs���Â�5��7�\n\r��U�,�2�`�� @�����@X��*�p:-,\rRZ�L�,ʃ|���l�^�O�0�	BC��R�n���V���� ��T�]�Mr����#���y�\\\"y�\$���/ r*h��%�1�K����ρ|R`b�B�8�r�1��n\0��		�\r�U8�l�tB��(����\0003:����%��-|�\0�eTH\"H�q4(�N\\jc������T�H\n�\0��m�3�?1S:>|g���Rc����\r�F8Q&�@5r\0��XV�5�\\�f�h@v,����/\0\n&�/!��dq��KR����m;�aD2���d\0002��b\$	�L�/1��,�E�4���@<�}aی�\$��1*���`�>0� :��d 	-	Ä\rD�Yl(6[6�k�sf��' 8I��T�JDUD:A�2�hd\0a\0����)2�:��B3:����Z1=���@�-qN\\!�\$�k�f���N�w	������`�n\$L�CR�����5�pc�E3Ca��\0=�Hjڒg����-ژ�E�e�.\0�!o�,�'�w�I`\\s6�R��E�}e0F\\��m�|F>q ?jД�6i��p	��+�N���������9��qu��p�2eɑ��m�.�+L~\$\"���R�s]i��qC�И<T(i��یQ��bt�\"��N�B��mư�@r���xMM�q�#Oj /	 L�D�K�.��t0tI�eB��j��1���6�0~s�74�bQ�Q�!�2��Ԗ��Ǽ�D��H��2��P��d�mM�� DֈF�fȹ\r�Dj\$��L�[\0�`����<@m�V~9� v�4��=!��2�ْ�6�'��*D������#��\0��{��'�2�lLR�J����ўX�ë,E�(C�\\�G����;/�����R�\$��d��\$�QJ`τ!Ү��K�\n|�9�T�dx�@�h!'���E��-�v}b�;|cfL����YARO�ڇ|3�Eg�zQf�@�l��/i����o�E�ŗgo^q�\nAaΔg˰!�@�R��4��1lE!�p��H0�jb��q�A��a�@xT���ݙ\0\r�F����45H�Zm=�x�F�C̙���v?C��L�2�}hfX��\$`I��b�\0ĭ7�G��Dũ�βfP9U��`\"�����\r���IjԍʶT�\rUz��*��T��!CI`���X2 �Q��k#ԅ\ne�e�+[l~:��~�hn	�h�'͙ΧUV���N�WL��ՋQ=)nI�������҄�^Y���pU�O�AXZ�U�����S�����\\��@Cr�\"���̈́;�^E��-�x\r��\\�P������v!I:Z	�\\�_�2CP�tWY��̰ �_]�a+�=s���]�uC-h�* ���Һ	{���+�Z���D\$�c\$-v�B�P�.���s¤�2�R��j[Z�/Q�Q:����1Y�+ھ�ھ�!�S�b���9�Zy���b,�t0��f=@�\r�-��\nB-ɟ0�&2_�9����hM,ב2�H�oT���lbd����� \0�[�\"�%A־�4;2͒d.��˗H�Zb545H�\\�ʓT��A������RBʄ֤�-��l��Jsύ�6\"� Ȃk=������<�>��jZg�x`�6��t�.���b,�ͩ��k��Y�\\`'��Sl�jհ!ln���\0Wg+:+�c6~����KF�ʖĩ-���h9-��H@SD�G�;�Π��_��	\n�)��fn���Q�-*�C֩��{�MSnZED\0)��Pg]���6���b%�%���Hj&%-* 9}�j43@�*(m�\$QD��ۆ��ҹ(��m¼ukjO�\" ,1����Vv�%s�1k�P�`�	�/�@��0>F�>#��X��8%�lⴹK��S|�Yw0u̧bÉ�X4p\0\n�������%�\0Z�Q2W�WE�k��oɇ�j�y�	�.Z\0�	Pp�t�H���R�>��,%)�k����`|��,prZ�h���Z,P���|��CFL�x�n�� ���.���PRe��V�oB;xD���k�)�M?n�`��/�5Il�qh\0�צ�5Eh�q�폴���A�ˉU��d��kD��Oy;���Ɔ�ë�A.Or�Ƅ�!��H��^ҋD3�I��g��>���c��e~��Z�o������n�_^�+��!��h�|*3ޢ�G���[�n����ڶ�j��p�����7H�/��T��+��3��lP{<2��ʞЩ�)\"ãލ���Yˣ�A2��:���&\0ۃ~cK���\n��D�4�GN�g.`�RB1�H.j�{��}n�|���/��o�����`]��f_6�y`�\r x^@����\\R�=�'ς��_{X-���\\)L�E��������P��l\\\0]��hareӝ8�N����G^��I:����ܵ�J%r�~�-܍	1�g��+gV�oσ�zm��>54�)�m���m�\$o�Eb����ܒ)m�E�Ѩ���K6!*\n��Ӕq�	��0?��w��PK��g�1�i��~X`\0X��Y�	�Z *Dh���1E�l�����\r\0:?\r>��#2�@�3�h2��袰��Æ&��O�е.�Ʉ��(.L<r����K�#���@A��[,L�5�4��<!�r���,��YI�H��d)+l�\$U\\|���'��ݣT���\0�'���\$�;\0����Q��w�ֹ~⌴0qt^2y�����L.����a{�(�!��*\0i~?9�ÄG�l2�3�v4�?f[r�Ԇ;A�Yn��)�� �&���P�2D@���� �]�w�K2�x� .�p��[4�u6�(�} J3�\0x\\�T\\)!�>bV����Eь�s���:��8�8{�>χ�A�o��Hry�����S�d�vm�r׃f���>jO�\n�À�5��ֳ͂A�0���0�2�>n���f����16q3���]+�a�r�F��x6	S-3e�+�x��̤��/j�hD\r��-\n�ј��G7����z2i���.�A9��f`�Y��T�x�9���\"^\\�n���ݣs�9������{0s�83�\$�:#��3��Y�6�{0�\n�J\$�#D�\\�ļ�����@�Ў�3u�0��\"*��.rs���؛�����5����G_ȎD�dH�Km]���\\4\0;d}��[S2ܜ����}ޞ���Kd�& t�rf	*j�+�Px��܍\r��7�M8A�[#��m��\n�\n𧀯9��+�Z���H�|H[��_�ź�|���j5H�|���U1��^�u]��P L`X�gh �_r���s�m�Z:l]ih�s�K��>����e�c9��p7�j�C��L���Rp``�������");
    } else {
        header("Content-Type: image/gif");
        switch ($_GET["file"]) {
            case"plus.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0!�����M��*)�o�) q��e���#��L�\0;";
                break;
            case"cross.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;";
                break;
            case"up.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;";
                break;
            case"down.gif":
                echo "GIF87a\0\0�\0\0���\0\0\0���\0\0\0,\0\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;";
                break;
            case"arrow.gif":
                echo "GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;";
                break;
        }
    }
    exit;
}
function
connection()
{
    global $h;
    return $h;
}

function
adminer()
{
    global $c;
    return $c;
}

function
idf_unescape($Ic)
{
    $cd = substr($Ic, -1);
    return
        str_replace($cd . $cd, $cd, substr($Ic, 1, -1));
}

function
escape_string($X)
{
    return
        substr(q($X), 1, -1);
}

function
remove_slashes($De, $lc = false)
{
    if (get_magic_quotes_gpc()) {
        while (list($z, $X) = each($De)) {
            foreach ($X
                     as $Vc => $W) {
                unset($De[$z][$Vc]);
                if (is_array($W)) {
                    $De[$z][stripslashes($Vc)] = $W;
                    $De[] =& $De[$z][stripslashes($Vc)];
                } else$De[$z][stripslashes($Vc)] = ($lc ? $W : stripslashes($W));
            }
        }
    }
}

function
bracket_escape($Ic, $ya = false)
{
    static $Yf = array(':' => ':1', ']' => ':2', '[' => ':3');
    return
        strtr($Ic, ($ya ? array_flip($Yf) : $Yf));
}

function
h($tf)
{
    return
        htmlspecialchars(str_replace("\0", "", $tf), ENT_QUOTES);
}

function
nbsp($tf)
{
    return (trim($tf) != "" ? h($tf) : "&nbsp;");
}

function
nl_br($tf)
{
    return
        str_replace("\n", "<br>", $tf);
}

function
checkbox($F, $Y, $Ka, $Zc = "", $Sd = "", $Na = "")
{
    $L = "<input type='checkbox' name='$F' value='" . h($Y) . "'" . ($Ka ? " checked" : "") . ($Sd ? ' onclick="' . h($Sd) . '"' : '') . ">";
    return ($Zc != "" || $Na ? "<label" . ($Na ? " class='$Na'" : "") . ">$L" . h($Zc) . "</label>" : $L);
}

function
optionlist($Vd, $ff = null, $rg = false)
{
    $L = "";
    foreach ($Vd
             as $Vc => $W) {
        $Wd = array($Vc => $W);
        if (is_array($W)) {
            $L .= '<optgroup label="' . h($Vc) . '">';
            $Wd = $W;
        }
        foreach ($Wd
                 as $z => $X) $L .= '<option' . ($rg || is_string($z) ? ' value="' . h($z) . '"' : '') . (($rg || is_string($z) ? (string)$z : $X) === $ff ? ' selected' : '') . '>' . h($X);
        if (is_array($W)) $L .= '</optgroup>';
    }
    return $L;
}

function
html_select($F, $Vd, $Y = "", $Rd = true)
{
    if ($Rd) return "<select name='" . h($F) . "'" . (is_string($Rd) ? ' onchange="' . h($Rd) . '"' : "") . ">" . optionlist($Vd, $Y) . "</select>";
    $L = "";
    foreach ($Vd
             as $z => $X) $L .= "<label><input type='radio' name='" . h($F) . "' value='" . h($z) . "'" . ($z == $Y ? " checked" : "") . ">" . h($X) . "</label>";
    return $L;
}

function
confirm($fb = "")
{
    return " onclick=\"return confirm('" . lang(0) . ($fb ? " (' + $fb + ')" : "") . "');\"";
}

function
print_fieldset($u, $hd, $xg = false, $Sd = "")
{
    echo "<fieldset><legend><a href='#fieldset-$u' onclick=\"" . h($Sd) . "return !toggle('fieldset-$u');\">$hd</a></legend><div id='fieldset-$u'" . ($xg ? "" : " class='hidden'") . ">\n";
}

function
bold($Ea)
{
    return ($Ea ? " class='active'" : "");
}

function
odd($L = ' class="odd"')
{
    static $t = 0;
    if (!$L) $t = -1;
    return ($t++ % 2 ? $L : '');
}

function
js_escape($tf)
{
    return
        addcslashes($tf, "\r\n'\\/");
}

function
json_row($z, $X = null)
{
    static $mc = true;
    if ($mc) echo "{";
    if ($z != "") {
        echo ($mc ? "" : ",") . "\n\t\"" . addcslashes($z, "\r\n\"\\") . '": ' . ($X !== null ? '"' . addcslashes($X, "\r\n\"\\") . '"' : 'undefined');
        $mc = false;
    } else {
        echo "\n}\n";
        $mc = true;
    }
}

function
ini_bool($Mc)
{
    $X = ini_get($Mc);
    return (eregi('^(on|true|yes)$', $X) || (int)$X);
}

function
sid()
{
    static $L;
    if ($L === null) $L = (SID && !($_COOKIE && ini_bool("session.use_cookies")));
    return $L;
}

function
q($tf)
{
    global $h;
    return $h->quote($tf);
}

function
get_vals($J, $e = 0)
{
    global $h;
    $L = array();
    $K = $h->query($J);
    if (is_object($K)) {
        while ($M = $K->fetch_row()) $L[] = $M[$e];
    }
    return $L;
}

function
get_key_vals($J, $i = null)
{
    global $h;
    if (!is_object($i)) $i = $h;
    $L = array();
    $K = $i->query($J);
    if (is_object($K)) {
        while ($M = $K->fetch_row()) $L[$M[0]] = $M[1];
    }
    return $L;
}

function
get_rows($J, $i = null, $m = "<p class='error'>")
{
    global $h;
    $ab = (is_object($i) ? $i : $h);
    $L = array();
    $K = $ab->query($J);
    if (is_object($K)) {
        while ($M = $K->fetch_assoc()) $L[] = $M;
    } elseif (!$K && !is_object($i) && $m && defined("PAGE_HEADER")) echo $m . error() . "\n";
    return $L;
}

function
unique_array($M, $w)
{
    foreach ($w
             as $v) {
        if (ereg("PRIMARY|UNIQUE", $v["type"])) {
            $L = array();
            foreach ($v["columns"] as $z) {
                if (!isset($M[$z])) continue
                2;
                $L[$z] = $M[$z];
            }
            return $L;
        }
    }
}

function
where($Z, $o = array())
{
    global $y;
    $L = array();
    $wc = '(^[\w\(]+' . str_replace("_", ".*", preg_quote(idf_escape("_"))) . '\)+$)';
    foreach ((array)$Z["where"] as $z => $X) {
        $z = bracket_escape($z, 1);
        $e = (preg_match($wc, $z) ? $z : idf_escape($z));
        $L[] = $e . (($y == "sql" && ereg('^[0-9]*\\.[0-9]*$', $X)) || $y == "mssql" ? " LIKE " . q(addcslashes($X, "%_\\")) : " = " . unconvert_field($o[$z], q($X)));
        if ($y == "sql" && ereg("[^ -@]", $X)) $L[] = "$e = " . q($X) . " COLLATE utf8_bin";
    }
    foreach ((array)$Z["null"] as $z) $L[] = (preg_match($wc, $z) ? $z : idf_escape($z)) . " IS NULL";
    return
        implode(" AND ", $L);
}

function
where_check($X, $o = array())
{
    parse_str($X, $Ja);
    remove_slashes(array(&$Ja));
    return
        where($Ja, $o);
}

function
where_link($t, $e, $Y, $Td = "=")
{
    return "&where%5B$t%5D%5Bcol%5D=" . urlencode($e) . "&where%5B$t%5D%5Bop%5D=" . urlencode(($Y !== null ? $Td : "IS NULL")) . "&where%5B$t%5D%5Bval%5D=" . urlencode($Y);
}

function
convert_fields($f, $o, $O = array())
{
    $L = "";
    foreach ($f
             as $z => $X) {
        if ($O && !in_array(idf_escape($z), $O)) continue;
        $ta = convert_field($o[$z]);
        if ($ta) $L .= ", $ta AS " . idf_escape($z);
    }
    return $L;
}

function
cookie($F, $Y)
{
    global $ba;
    $ie = array($F, (ereg("\n", $Y) ? "" : $Y), time() + 2592000, preg_replace('~\\?.*~', '', $_SERVER["REQUEST_URI"]), "", $ba);
    if (version_compare(PHP_VERSION, '5.2.0') >= 0) $ie[] = true;
    return
        call_user_func_array('setcookie', $ie);
}

function
restart_session()
{
    if (!ini_bool("session.use_cookies")) session_start();
}

function
stop_session()
{
    if (!ini_bool("session.use_cookies")) session_write_close();
}

function&get_session($z)
{
    return $_SESSION[$z][DRIVER][SERVER][$_GET["username"]];
}

function
set_session($z, $X)
{
    $_SESSION[$z][DRIVER][SERVER][$_GET["username"]] = $X;
}

function
auth_url($_b, $P, $V, $l = null)
{
    global $Ab;
    preg_match('~([^?]*)\\??(.*)~', remove_from_uri(implode("|", array_keys($Ab)) . "|username|" . ($l !== null ? "db|" : "") . session_name()), $C);
    return "$C[1]?" . (sid() ? SID . "&" : "") . ($_b != "server" || $P != "" ? urlencode($_b) . "=" . urlencode($P) . "&" : "") . "username=" . urlencode($V) . ($l != "" ? "&db=" . urlencode($l) : "") . ($C[2] ? "&$C[2]" : "");
}

function
is_ajax()
{
    return ($_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest");
}

function
redirect($B, $D = null)
{
    if ($D !== null) {
        restart_session();
        $_SESSION["messages"][preg_replace('~^[^?]*~', '', ($B !== null ? $B : $_SERVER["REQUEST_URI"]))][] = $D;
    }
    if ($B !== null) {
        if ($B == "") $B = ".";
        header("Location: $B");
        exit;
    }
}

function
query_redirect($J, $B, $D, $Je = true, $Zb = true, $fc = false)
{
    global $h, $m, $c;
    $Of = "";
    if ($Zb) {
        $pf = microtime();
        $fc = !$h->query($J);
        $Of = "; -- " . format_time($pf, microtime());
    }
    $of = "";
    if ($J) $of = $c->messageQuery($J . $Of);
    if ($fc) {
        $m = error() . $of;
        return
            false;
    }
    if ($Je) redirect($B, $D . $of);
    return
        true;
}

function
queries($J = null)
{
    global $h;
    static $Ge = array();
    if ($J === null) return
        implode("\n", $Ge);
    $pf = microtime();
    $L = $h->query($J);
    $Ge[] = (ereg(';$', $J) ? "DELIMITER ;;\n$J;\nDELIMITER " : $J) . "; -- " . format_time($pf, microtime());
    return $L;
}

function
apply_queries($J, $Ff, $Ub = 'table')
{
    foreach ($Ff
             as $R) {
        if (!queries("$J " . $Ub($R))) return
            false;
    }
    return
        true;
}

function
queries_redirect($B, $D, $Je)
{
    return
        query_redirect(queries(), $B, $D, $Je, false, !$Je);
}

function
format_time($pf, $Ob)
{
    return
        lang(1, max(0, array_sum(explode(" ", $Ob)) - array_sum(explode(" ", $pf))));
}

function
remove_from_uri($he = "")
{
    return
        substr(preg_replace("~(?<=[?&])($he" . (SID ? "" : "|" . session_name()) . ")=[^&]*&~", '', "$_SERVER[REQUEST_URI]&"), 0, -1);
}

function
pagination($H, $jb)
{
    return " " . ($H == $jb ? $H + 1 : '<a href="' . h(remove_from_uri("page") . ($H ? "&page=$H" : "")) . '">' . ($H + 1) . "</a>");
}

function
get_file($z, $qb = false)
{
    $jc = $_FILES[$z];
    if (!$jc) return
        null;
    foreach ($jc
             as $z => $X) $jc[$z] = (array)$X;
    $L = '';
    foreach ($jc["error"] as $z => $m) {
        if ($m) return $m;
        $F = $jc["name"][$z];
        $Vf = $jc["tmp_name"][$z];
        $bb = file_get_contents($qb && ereg('\\.gz$', $F) ? "compress.zlib://$Vf" : $Vf);
        if ($qb) {
            $pf = substr($bb, 0, 3);
            if (function_exists("iconv") && ereg("^\xFE\xFF|^\xFF\xFE", $pf, $Qe)) $bb = iconv("utf-16", "utf-8", $bb); elseif ($pf == "\xEF\xBB\xBF") $bb = substr($bb, 3);
        }
        $L .= $bb . "\n\n";
    }
    return $L;
}

function
upload_error($m)
{
    $td = ($m == UPLOAD_ERR_INI_SIZE ? ini_get("upload_max_filesize") : 0);
    return ($m ? lang(2) . ($td ? " " . lang(3, $td) : "") : lang(4));
}

function
repeat_pattern($qe, $id)
{
    return
        str_repeat("$qe{0,65535}", $id / 65535) . "$qe{0," . ($id % 65535) . "}";
}

function
is_utf8($X)
{
    return (preg_match('~~u', $X) && !preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~', $X));
}

function
shorten_utf8($tf, $id = 80, $xf = "")
{
    if (!preg_match("(^(" . repeat_pattern("[\t\r\n -\x{FFFF}]", $id) . ")($)?)u", $tf, $C)) preg_match("(^(" . repeat_pattern("[\t\r\n -~]", $id) . ")($)?)", $tf, $C);
    return
        h($C[1]) . $xf . (isset($C[2]) ? "" : "<i>...</i>");
}

function
friendly_url($X)
{
    return
        preg_replace('~[^a-z0-9_]~i', '-', $X);
}

function
hidden_fields($De, $Jc = array())
{
    while (list($z, $X) = each($De)) {
        if (is_array($X)) {
            foreach ($X
                     as $Vc => $W) $De[$z . "[$Vc]"] = $W;
        } elseif (!in_array($z, $Jc)) echo '<input type="hidden" name="' . h($z) . '" value="' . h($X) . '">';
    }
}

function
hidden_fields_get()
{
    echo(sid() ? '<input type="hidden" name="' . session_name() . '" value="' . h(session_id()) . '">' : ''), (SERVER !== null ? '<input type="hidden" name="' . DRIVER . '" value="' . h(SERVER) . '">' : ""), '<input type="hidden" name="username" value="' . h($_GET["username"]) . '">';
}

function
table_status1($R, $gc = false)
{
    $L = table_status($R, $gc);
    return ($L ? $L : array("Name" => $R));
}

function
column_foreign_keys($R)
{
    global $c;
    $L = array();
    foreach ($c->foreignKeys($R) as $p) {
        foreach ($p["source"] as $X) $L[$X][] = $p;
    }
    return $L;
}

function
enum_input($U, $va, $n, $Y, $Nb = null)
{
    global $c;
    preg_match_all("~'((?:[^']|'')*)'~", $n["length"], $od);
    $L = ($Nb !== null ? "<label><input type='$U'$va value='$Nb'" . ((is_array($Y) ? in_array($Nb, $Y) : $Y === 0) ? " checked" : "") . "><i>" . lang(5) . "</i></label>" : "");
    foreach ($od[1] as $t => $X) {
        $X = stripcslashes(str_replace("''", "'", $X));
        $Ka = (is_int($Y) ? $Y == $t + 1 : (is_array($Y) ? in_array($t + 1, $Y) : $Y === $X));
        $L .= " <label><input type='$U'$va value='" . ($t + 1) . "'" . ($Ka ? ' checked' : '') . '>' . h($c->editVal($X, $n)) . '</label>';
    }
    return $L;
}

function
input($n, $Y, $r)
{
    global $h, $gg, $c, $y;
    $F = h(bracket_escape($n["field"]));
    echo "<td class='function'>";
    $Se = ($y == "mssql" && $n["auto_increment"]);
    if ($Se && !$_POST["save"]) $r = null;
    $xc = (isset($_GET["select"]) || $Se ? array("orig" => lang(6)) : array()) + $c->editFunctions($n);
    $va = " name='fields[$F]'";
    if ($n["type"] == "enum") echo
        nbsp($xc[""]) . "<td>" . $c->editInput($_GET["edit"], $n, $va, $Y); else {
        $mc = 0;
        foreach ($xc
                 as $z => $X) {
            if ($z === "" || !$X) break;
            $mc++;
        }
        $Rd = ($mc ? " onchange=\"var f = this.form['function[" . h(js_escape(bracket_escape($n["field"]))) . "]']; if ($mc > f.selectedIndex) f.selectedIndex = $mc;\"" : "");
        $va .= $Rd;
        echo (count($xc) > 1 ? html_select("function[$F]", $xc, $r === null || in_array($r, $xc) || isset($xc[$r]) ? $r : "", "functionChange(this);") : nbsp(reset($xc))) . '<td>';
        $Oc = $c->editInput($_GET["edit"], $n, $va, $Y);
        if ($Oc != "") echo $Oc; elseif ($n["type"] == "set") {
            preg_match_all("~'((?:[^']|'')*)'~", $n["length"], $od);
            foreach ($od[1] as $t => $X) {
                $X = stripcslashes(str_replace("''", "'", $X));
                $Ka = (is_int($Y) ? ($Y >> $t) & 1 : in_array($X, explode(",", $Y), true));
                echo " <label><input type='checkbox' name='fields[$F][$t]' value='" . (1 << $t) . "'" . ($Ka ? ' checked' : '') . "$Rd>" . h($c->editVal($X, $n)) . '</label>';
            }
        } elseif (ereg('blob|bytea|raw|file', $n["type"]) && ini_bool("file_uploads")) echo "<input type='file' name='fields-$F'$Rd>";
        elseif (($Mf = ereg('text|lob', $n["type"])) || ereg("\n", $Y)) {
            if ($Mf && $y != "sqlite") $va .= " cols='50' rows='12'"; else {
                $N = min(12, substr_count($Y, "\n") + 1);
                $va .= " cols='30' rows='$N'" . ($N == 1 ? " style='height: 1.2em;'" : "");
            }
            echo "<textarea$va>" . h($Y) . '</textarea>';
        } else {
            $vd = (!ereg('int', $n["type"]) && preg_match('~^(\\d+)(,(\\d+))?$~', $n["length"], $C) ? ((ereg("binary", $n["type"]) ? 2 : 1) * $C[1] + ($C[3] ? 1 : 0) + ($C[2] && !$n["unsigned"] ? 1 : 0)) : ($gg[$n["type"]] ? $gg[$n["type"]] + ($n["unsigned"] ? 0 : 1) : 0));
            if ($y == 'sql' && $h->server_info >= 5.6 && ereg('time', $n["type"])) $vd += 7;
            echo "<input" . (ereg('int', $n["type"]) ? " type='number'" : "") . " value='" . h($Y) . "'" . ($vd ? " maxlength='$vd'" : "") . (ereg('char|binary', $n["type"]) && $vd > 20 ? " size='40'" : "") . "$va>";
        }
    }
}

function
process_input($n)
{
    global $c;
    $Ic = bracket_escape($n["field"]);
    $r = $_POST["function"][$Ic];
    $Y = $_POST["fields"][$Ic];
    if ($n["type"] == "enum") {
        if ($Y == -1) return
            false;
        if ($Y == "") return "NULL";
        return +$Y;
    }
    if ($n["auto_increment"] && $Y == "") return
        null;
    if ($r == "orig") return ($n["on_update"] == "CURRENT_TIMESTAMP" ? idf_escape($n["field"]) : false);
    if ($r == "NULL") return "NULL";
    if ($n["type"] == "set") return
        array_sum((array)$Y);
    if (ereg('blob|bytea|raw|file', $n["type"]) && ini_bool("file_uploads")) {
        $jc = get_file("fields-$Ic");
        if (!is_string($jc)) return
            false;
        return
            q($jc);
    }
    return $c->processInput($n, $Y, $r);
}

function
search_tables()
{
    global $c, $h;
    $_GET["where"][0]["op"] = "LIKE %%";
    $_GET["where"][0]["val"] = $_POST["query"];
    $rc = false;
    foreach (table_status('', true) as $R => $S) {
        $F = $c->tableName($S);
        if (isset($S["Engine"]) && $F != "" && (!$_POST["tables"] || in_array($R, $_POST["tables"]))) {
            $K = $h->query("SELECT" . limit("1 FROM " . table($R), " WHERE " . implode(" AND ", $c->selectSearchProcess(fields($R), array())), 1));
            if (!$K || $K->fetch_row()) {
                if (!$rc) {
                    echo "<ul>\n";
                    $rc = true;
                }
                echo "<li>" . ($K ? "<a href='" . h(ME . "select=" . urlencode($R) . "&where[0][op]=" . urlencode($_GET["where"][0]["op"]) . "&where[0][val]=" . urlencode($_GET["where"][0]["val"])) . "'>$F</a>\n" : "$F: <span class='error'>" . error() . "</span>\n");
            }
        }
    }
    echo ($rc ? "</ul>" : "<p class='message'>" . lang(7)) . "\n";
}

function
dump_headers($Hc, $Bd = false)
{
    global $c;
    $L = $c->dumpHeaders($Hc, $Bd);
    $fe = $_POST["output"];
    if ($fe != "text") header("Content-Disposition: attachment; filename=" . $c->dumpFilename($Hc) . ".$L" . ($fe != "file" && !ereg('[^0-9a-z]', $fe) ? ".$fe" : ""));
    session_write_close();
    ob_flush();
    flush();
    return $L;
}

function
dump_csv($M)
{
    foreach ($M
             as $z => $X) {
        if (preg_match("~[\"\n,;\t]~", $X) || $X === "") $M[$z] = '"' . str_replace('"', '""', $X) . '"';
    }
    echo
        implode(($_POST["format"] == "csv" ? "," : ($_POST["format"] == "tsv" ? "\t" : ";")), $M) . "\r\n";
}

function
apply_sql_function($r, $e)
{
    return ($r ? ($r == "unixepoch" ? "DATETIME($e, '$r')" : ($r == "count distinct" ? "COUNT(DISTINCT " : strtoupper("$r(")) . "$e)") : $e);
}

function
password_file($j)
{
    $xb = ini_get("upload_tmp_dir");
    if (!$xb) {
        if (function_exists('sys_get_temp_dir')) $xb = sys_get_temp_dir(); else {
            $kc = @tempnam("", "");
            if (!$kc) return
                false;
            $xb = dirname($kc);
            unlink($kc);
        }
    }
    $kc = "$xb/adminer.key";
    $L = @file_get_contents($kc);
    if ($L || !$j) return $L;
    $tc = @fopen($kc, "w");
    if ($tc) {
        $L = md5(uniqid(mt_rand(), true));
        fwrite($tc, $L);
        fclose($tc);
    }
    return $L;
}

function
is_mail($Kb)
{
    $ua = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]';
    $zb = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
    $qe = "$ua+(\\.$ua+)*@($zb?\\.)+$zb";
    return
        preg_match("(^$qe(,\\s*$qe)*\$)i", $Kb);
}

function
is_url($tf)
{
    $zb = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
    return (preg_match("~^(https?)://($zb?\\.)+$zb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i", $tf, $C) ? strtolower($C[1]) : "");
}

function
is_shortable($n)
{
    return
        ereg('char|text|lob|geometry|point|linestring|polygon', $n["type"]);
}

function
slow_query($J)
{
    global $c, $T;
    $l = $c->database();
    if (support("kill") && is_object($i = connect()) && ($l == "" || $i->select_db($l))) {
        $Xc = $i->result("SELECT CONNECTION_ID()");
        echo '<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'', js_escape(ME), 'script=kill\', function () {
	}, \'token=', $T, '&kill=', $Xc, '\');
}, ', 1000 * $c->queryTimeout(), ');
</script>
';
    } else$i = null;
    ob_flush();
    flush();
    $L = @get_key_vals($J, $i);
    if ($i) {
        echo "<script type='text/javascript'>clearTimeout(timeout);</script>\n";
        ob_flush();
        flush();
    }
    return
        array_keys($L);
}

function
lzw_decompress($Ba)
{
    $wb = 256;
    $Ca = 8;
    $Pa = array();
    $Te = 0;
    $Ue = 0;
    for ($t = 0; $t < strlen($Ba); $t++) {
        $Te = ($Te << 8) + ord($Ba[$t]);
        $Ue += 8;
        if ($Ue >= $Ca) {
            $Ue -= $Ca;
            $Pa[] = $Te >> $Ue;
            $Te &= (1 << $Ue) - 1;
            $wb++;
            if ($wb >> $Ca) $Ca++;
        }
    }
    $vb = range("\0", "\xFF");
    $L = "";
    foreach ($Pa
             as $t => $Oa) {
        $Jb = $vb[$Oa];
        if (!isset($Jb)) $Jb = $Ag . $Ag[0];
        $L .= $Jb;
        if ($t) $vb[] = $Ag . $Jb[0];
        $Ag = $Jb;
    }
    return $L;
}

global $c, $h, $Ab, $Hb, $Rb, $m, $xc, $Ac, $ba, $Nc, $y, $a, $bd, $Qd, $re, $uf, $T, $ag, $gg, $ng, $fa;
if (!$_SERVER["REQUEST_URI"]) $_SERVER["REQUEST_URI"] = $_SERVER["ORIG_PATH_INFO"];
if (!strpos($_SERVER["REQUEST_URI"], '?') && $_SERVER["QUERY_STRING"] != "") $_SERVER["REQUEST_URI"] .= "?$_SERVER[QUERY_STRING]";
$ba = $_SERVER["HTTPS"] && strcasecmp($_SERVER["HTTPS"], "off");
@ini_set("session.use_trans_sid", false);
if (!defined("SID")) {
    session_name("adminer_sid");
    $ie = array(0, preg_replace('~\\?.*~', '', $_SERVER["REQUEST_URI"]), "", $ba);
    if (version_compare(PHP_VERSION, '5.2.0') >= 0) $ie[] = true;
    call_user_func_array('session_set_cookie_params', $ie);
    session_start();
}
remove_slashes(array(&$_GET, &$_POST, &$_COOKIE), $lc);
if (function_exists("set_magic_quotes_runtime")) set_magic_quotes_runtime(false);
@set_time_limit(0);
@ini_set("zend.ze1_compatibility_mode", false);
@ini_set("precision", 20);
$bd = array('en' => 'English', 'ar' => 'العربية', 'bn' => 'বাংলা', 'ca' => 'Català', 'cs' => 'Čeština', 'de' => 'Deutsch', 'es' => 'Español', 'et' => 'Eesti', 'fa' => 'فارسی', 'fr' => 'Français', 'hu' => 'Magyar', 'id' => 'Bahasa Indonesia', 'it' => 'Italiano', 'ja' => '日本語', 'ko' => '한국어', 'lt' => 'Lietuvių', 'nl' => 'Nederlands', 'pl' => 'Polski', 'pt' => 'Português', 'ro' => 'Limba Română', 'ru' => 'Русский язык', 'sk' => 'Slovenčina', 'sl' => 'Slovenski', 'sr' => 'Српски', 'ta' => 'த‌மிழ்', 'tr' => 'Türkçe', 'uk' => 'Українська', 'zh' => '简体中文', 'zh-tw' => '繁體中文',);
function
get_lang()
{
    global $a;
    return $a;
}

function
lang($Ic, $G = null)
{
    if (is_string($Ic)) {
        $te = array_search($Ic, get_translations("en"));
        if ($te !== false) $Ic = $te;
    }
    global $a, $ag;
    $Zf = ($ag[$Ic] ? $ag[$Ic] : $Ic);
    if (is_array($Zf)) {
        $te = ($G == 1 ? 0 : ($a == 'cs' || $a == 'sk' ? ($G && $G < 5 ? 1 : 2) : ($a == 'fr' ? (!$G ? 0 : 1) : ($a == 'pl' ? ($G % 10 > 1 && $G % 10 < 5 && $G / 10 % 10 != 1 ? 1 : 2) : ($a == 'sl' ? ($G % 100 == 1 ? 0 : ($G % 100 == 2 ? 1 : ($G % 100 == 3 || $G % 100 == 4 ? 2 : 3))) : ($a == 'lt' ? ($G % 10 == 1 && $G % 100 != 11 ? 0 : ($G % 10 > 1 && $G / 10 % 10 != 1 ? 1 : 2)) : ($a == 'ru' || $a == 'sr' || $a == 'uk' ? ($G % 10 == 1 && $G % 100 != 11 ? 0 : ($G % 10 > 1 && $G % 10 < 5 && $G / 10 % 10 != 1 ? 1 : 2)) : 1)))))));
        $Zf = $Zf[$te];
    }
    $sa = func_get_args();
    array_shift($sa);
    $qc = str_replace("%d", "%s", $Zf);
    if ($qc != $Zf) $sa[0] = number_format($G, 0, ".", lang(8));
    return
        vsprintf($qc, $sa);
}

function
switch_lang()
{
    global $a, $bd;
    echo "<form action='' method='post'>\n<div id='lang'>", lang(9) . ": " . html_select("lang", $bd, $a, "this.form.submit();"), " <input type='submit' value='" . lang(10) . "' class='hidden'>\n", "<input type='hidden' name='token' value='$_SESSION[token]'>\n";
    echo "</div>\n</form>\n";
}

if (isset($_POST["lang"]) && $_SESSION["token"] == $_POST["token"]) {
    cookie("adminer_lang", $_POST["lang"]);
    $_SESSION["lang"] = $_POST["lang"];
    $_SESSION["translations"] = array();
    redirect(remove_from_uri());
}
$a = "en";
if (isset($bd[$_COOKIE["adminer_lang"]])) {
    cookie("adminer_lang", $_COOKIE["adminer_lang"]);
    $a = $_COOKIE["adminer_lang"];
} elseif (isset($bd[$_SESSION["lang"]])) $a = $_SESSION["lang"];
else {
    $ja = array();
    preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~', str_replace("_", "-", strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])), $od, PREG_SET_ORDER);
    foreach ($od
             as $C) $ja[$C[1]] = (isset($C[3]) ? $C[3] : 1);
    arsort($ja);
    foreach ($ja
             as $z => $I) {
        if (isset($bd[$z])) {
            $a = $z;
            break;
        }
        $z = preg_replace('~-.*~', '', $z);
        if (!isset($ja[$z]) && isset($bd[$z])) {
            $a = $z;
            break;
        }
    }
}
$ag =& $_SESSION["translations"];
if ($_SESSION["translations_version"] != -119515802) {
    $ag = array();
    $_SESSION["translations_version"] = -119515802;
}
function
get_translations($ad)
{
    switch ($ad) {
        case"en":
            $g = "A9D�y�@s:�G�(�ff�����	��:�S���a2\"1�..L'�I��m�#�s,�K��OP#I�@%9��i4�o2ύ���,9�%Si��y�F�9�(l�GH�\\�(��q��a3�bG;�:^b2��`�!���HN�ۑL�[��ɓӥ�^0��s)��e��\ng��PS���7;�S.\n(Ng3�h�|�EuW\"a��n�^M��)����̱s4ɱϚ\r�x>�ń܈&���@v4�NடTAd�]{BM��\n\"��3���d��\$&#��%��i<.!�#�s�4��r� ��:3��#p�2#�-���4/,*���H�޾jԖ�\"��߷�8�	�0\n�������C�ƶ3∘l�v75�x�ށC���;���8�g\$�Ѵ0݁B�F���0�r��R�����⽉*�6�%��� ���2�\0���&�K���o�9BH�;#`Ґ�b��#;�x�ޅ�A ;��H�&�¯%\r��8��|>ՌъP�5puJ8�@�*!�\"��U�#�\\��J2�;:K���A�C�4\\ya����-S�85Mc\\�\r�J��Ѐ���D4����x�y��\0گ/!r�3����</�4�Q�与�P��-�XDM6;.��x�'��/��4��o\"�!�Q�,W_E��\r�W���俤\"��(eM�YB��H\nED\$ѢP�%�r`7.�^b��i�H썃\"|���kJ��f�@R���%�ލJ�@(	☩&64������5>f��1����G�*J�Pl&XT��%�-��:��)�3��֮�;	�*g��5f�H92�;C|��E�σf�/��\r:�7�gYXk���wR�����k'�c}N�QJ�+2#Lh��������X�3��8ѷ�y�Ũ|�5_/㻌��	�czd��T{e��4����h2�����H���4^�p \n�@\"�@T\"���ҫ�%�<�#R�X�K��(*��Z�J+�%Y s�F�3�*�T�P�Q�MvA�������A��;�R����d��sp��lX.AX인xaHl�k=�����@)��)�P�ᡑa	@��\"m t�`*��^��S;���@�n��\n(7�иSXO=�����8_�PRN+ངSDo�۹K��:��FC��� �8��\$|�>���-���=g���OĹ9d�3e��L�/39��p&4ȗ�,��3��p�<���30��e%&Z�9�1	���ZKc���T�!,��W,G����r�5��Q��4�&!3^e�əh6MIbV��Fu���'���eTu�9�^��(\$´VbP���XI�w��[W��H�8%�S�|� yI����j=>��z��%�U@S� ��,����\n*gR.Z���z��\n�w�}�%0�M�^��:��Ȳ骡y)�T�E\0{�98����4�8l	�u ��W�bj5���	,NX��r����PdL���ϳs�m-�U���F����k�����X�38m�O����`x(\"����M<�v�~��P�a�-�lw5��[8n�̧�2�Uk�b�ݵQ6:�<��lnYrt�P�6_u,�7&�jeɽ3�,ДG�|Y�|�!?�p&f_�����7��]	Â hg��.�[e�'�N�S\n�׋HJ��\n=�o��)��L�[�y�!߆��b�6����nl���b��1<+��at!�՛�8)�0��5c���e*���t�T�q���[�m�F\\9�V�+�c.x8z�G�v�����\\��e2��P?/�|�\$���'u%�\\��q���sА3�ӄ6L�,{EW�K������X�^\$�fN���^.���D�8�I\n.7�X��!��	�T�+E��f�zM���0B`yW���H��𳽈��//G�ζ����ZH��h����i|i6Ξ���Z;��D���Suf�P\rR5�;����w;w�H�L����xk\$�]]�N�m�m��(�<Zb�x)!Ydd�\0����娹zoߞ2ym'ز�_y�J�\r��1�����#�da�����	埤�+u�B�F��\\#�B�^�䵛T)�/i�Y��Q\r�R&�+t?��*S���d\0/{κY&W���'àVb}��A�. +��cjH\n�gM�Y�ǐ��� O�\$Ǔ���9�m����m���&��=�1d�*���{�`ݢ�}'�x)��rwB�\n\\�9��p���o�n�R�g�P 	��	ې��\"]tD�J/nJ�y'p�֓�Ԇ9��[�\n-b�\"�<f��ޟ�\nC��KZ�=�We9�ܳ\$2��vI�yt7���e>\r� �Kj�B�";
            break;
        case"ar":
            $g = "�C�P���l*�\r�,&\n�A���(J.��0T2]6QM��O�!b�#e�\\ɥ�\$�\\\nl+[\n�d�k4�O��&�ղ���Q)̅7lI���E\$�ʑ��m_7�Td������Q�%F����PEdJ�]�MŖiE�t�T�'템9sBNs��%��c�5ut.�w��4ET�g�g�9��9M�*��-<�\0���ƭqwB��%~�k\rª���g��C%���v��\\ݕ0EE^O�ga�Y�*B�����s��x�^���}�X��.���b�|>T.O���p�:-�΂?E��@��0�7�Zpá��*�|��ʹa�����E)�ݮ�H�B,��%Ir�@)�V��)dE+(��CAo�Zl۰lKRp�CF�n�0����,�:��`@:#�2�c�7'S�᭩9\n\nb��!�l���% l���{�!���*NSv[�SKVZ,E\n��TmJ��Z^�:O��ջ,�J�H�qeB�R��,t��B�4^�r�ݲj�X�Q��L�Oo]�YCS�8��rE?%�N��C��6B�)�\0�7�c(܂7luS�	\rM>IA�1p*	>,*��UK��0���q|�kR ��,<�7\nx��HJ�Q����Mfl�5�[]Wd���5l�</�����; V�����P�0�c��9�h9��x�����4�C(�r��@4h�0z\r��8Ax^;�p�2\r�Hݛ������ �\rØ�7��xE/�#��2��x�1L�XD	#h�1�����|�a:\r|J:\r�P�n�H���l��a�#���d�].2�F��Oo>�@�䡨��!�JB����H�`	B�W��N���T@xz�(�B�]�V+�Dɥ�=s���ؼ^�'�b���o��������_ޚ�e��F����?b�B�zo~)5,�\0����SH�\"�Z�� \n (p�è L�|:�����JA�3��0iL`�;����P�!����Ϝ����7��6�ó`9��N��� ��R���*�N��Az1�u}��R��\0EE�Z� �!H+�±�W�uc+㔲K:*.�<P�W<���'(<�(�aM��)��@���ԩ�;�	w��UN��E5\r�#�wrd�	�{%�{\$h�\$b��P�wBQ�(��[�Z�.f��bv��:�\$b������?��\$\0���\0U\n �@�1�@D�0\"���a�g0�hǪ��\0�K�t.��!¶��zS�g�*����9#y%�����Zͫ�;�%�2_0�s5ȁ�)�-��/�ږ�8��Y5-����:!�\"}�E�ϣ�Fp	�,h)J���g)\r�aH@���\$������d�U��bf�WiD���\$�) ���/D���A&��T�O�	P54�ҶQ�j�uF�ڠ�b�&��,J��bF_�	mW2�5��;9F̜���)b�Ri�ݛ�rl�R�0Q��YY\n4	�1�\n�lN`�`��Q`�,Jl7\0��\"T�9���^�\"�Xk�O\$���Vyp��x�/k&��ŗ��f�0�Kg��xD�\0�\$��#�V!5��^vl��5wV��L	5���T��c��-{.����kM!Ueo�>^�b*��s]�#���(�܎�����1A��⫦�(3H���Lʢ2FR���O�9�8ǒ�E���Z6�� J~�\r(��@\$TD�x�(X�9�Ȥ@T�!�0�@��pA��6��\\� ���0�d�NHL)��\n��5�/X�*�)��'�-e˻��`Q4:�a|;np�g}����l2��Ғ�74\r�Ü�	yQ���皁'���ǒ���S�GV�2Z_�؟j�D�#',�7�s;S�M1f\r���TY�(�'��)���dR�����Գ1lEGEW(.G�r��#(H��+�1�^)菰5ƥ`��\"�\r�y�y�{rlذBf�kvX��R�3�B�h����?\$(������~T'	a�����-��0�XC�!Q�uH�<#0I-�IG\r�<\n��Z�}x�|�T̀^s��b�ǧ��Ӥ�z�u�D�f�E�,\"�*�sg\n�2�,�sr?`��9Z��1鷷x�/��{gA\nd|K�9\$.jJ�ã+��Tˎ!�*I�>�CE���@9z�O�)t�^OJ3�������&�#�ٟ���S���&0��N�Jp~m22��ѯH?�w\$Ȝ��Y��\r�D�H������Z��F�[����W�%�3|��E�zo)޽�[��e^�Bϼ����Xƚi�{�ގ{�����O��Q�?j���;&���س�E]���� �����]N��&~ϳ�?4�Q&h�\$�L��������!��!��А8P\0�6�Š9j�H�`�c6Q��݇�����A�Z�+��j��:,�Ek�c~+���G\n��B&�f1�DM�:c`)m�Z��@�`�\r��`�؄(X ���� �q����r��&���D�\r��f�@D�kɒ\n���p�p�\r��*>yM�\$�b��S��m ��%C��TE���b��o�<��������B�@%2L0O�ޡ��eF&�!9-Dv��(�^'M0��0 ����k��QZ��h�@Ʉ���.��\"\$��\$O�_�\0���*0����0Z2������aQ��@��`�q,x���[М\0���F�����)TeNZ��֤�r�Λ���\rKp�O,�d�!T*��n��,F�&B�.R���0�Al�~��Y�4 ��'Aj�갨�lEF&��܈Ҍ+�-p(�>DcV�\r Ү�X�zH�3�&�4	\0�@�	�t\n`�";
            break;
        case"bn":
            $g = "�S)\nt]\0_� 	XD)L��@�4l5���BQp�� 9��\n��\0��,��h�SE�0�b�a%�. �H�\0��.b��2n��D�e*�D��M���,OJÐ��v����х\$:IK��g5U4�L�	Nd!u>�&������a\\�@'Jx��S���4�zZز�S��H�MS���]�O��E2��\\�J1��|�Ц[�i�L��_?�P��\n}E\0�mv��|wKC��2\n֦����C��i��\\}ce̼[�W��=9D��:=�2����u�J�����S�Ș�����K^�%�b�I�m�*yB�AK�h��{ S�J궥*�S���+�6͠�;I�j�/�>ΪK��\0��3גmj0D��;j�5��F�q���sH�%O���IĔ��R�Fm0��c����#0��w2�a5�d���\"CD�<�mJ*23~S2�10��M��C�s\r\n���J��/�\$;)�^Q���\n�����,�������λ�\\���8@TE���3*�OM�996��Чس�����d#�`���6�\0�0��P�(��mp�̮�-ZSB��C�֋`�T�� �Bo�:�-C������4�dQ0��t8��V\n/�q�E&��4��-�z�a�1�2J%BS5ңD�ǵ�4�k\$S�{�8���sf0��_ 	aL�g�S\r0\rE)��~;x/Ѭ�d�g�E���HC`�9)���e*�\0�)�B6�y�����\"��\n��2��^�K�i�B��ͭCk��0KD�@f�R��+Ƭ,=KW.^ᗚ�-��.b'wN<�ҫ�e�J��I;!�Z�[�(o�8Y�LM�G�C\\�*���\\�L�M7spD���`�0�c��9��9��x�=���4�C(���\rh��C@�:�^ü��2����.|���P�C��\r��4����aA�2�G����\r`���\0m�������s�:�ޞ��o�a�5���\r���U֜��X戥;�x�:�3�D(�����Ze��D����M0\0�������Z�� #���K�T������V��6��.�B���qWZee{�Г3j=��i\n�LQ�rx)��WU<�tNE驆��J�rP&ed�YBYP�0���(P	�L*�F�J��dK������2i�G�)��0�-d�s��O����,�#�1(��b(��b��è \\a�XP�  ~a�4�p@��` ��p\0�_�F\n�]r'��	�4@���9��H�v�)	��ix�����mtװޕ�1�!�S��W��Z�ZI�W	-�^d�O��!7ZriN��R�(��W l}8��Z�n�סs�MW��h��K�u2��K��\n�!=�6�K�:�/QEX�Zƪ-�S9�D_UWEi��.�g(���*4AU�tJ�Xy#eƈ[E'\n�+�\\Xh��8W7FTAO���W�@�L�asU͇���:.<J�x�H�X[��RY84�����F�4̌Te_���v�@�S�\nzV��#���-miI�-¨���t�V}����Ѻ�\0���i�I�)J��k�h�Ǧ�FՍ�qɡ�[sޡ�Qa?�D�4�A\$LZvJ�ڜcx�J��:�0k�}L�q�vP�\ne���JV�����9�����i���!��t��y��8�!i��t��%�qMfbe���Ay޺aTd�ӚW���)�Ʃ��k�2c����搶}���gv��\\&��U�+���]��J¦��ؘ|�>STN�ԓ��rVY��\"�����\\?��/���C]IE��9@%c�iS�z��W\rT���nz�4��X��Q���h�7��D�W���Gw#[��&:C<���t�ZNe���㧰!�aڍ�E�{�4&�Zƶ<�r��\\��Mi���D��)��ul�#���ϻ����ӊ�޳rT�C�޺6���zK9��3��>�my�o�mu��RW	��b�Xk�/PK��\$�>L�f(eJ��]fA/t��I~M��L�n�[�䍽-��H6�0V��[8���(�0R���l�z~O�*ђ�u)�[M<]r}�|x���o�����x�<�2�e�n��6昿��j����X�5gSf�ܗ>(���&��Q��q']aS\"\n4����\n��L��[��>���f�o3wQ��zs������j��y��S~p���B�\0n�A�9�� �2�3�8@����h\r>�o.����'�8�-)��&��9�;F�I��wIh�6�߾C����I�s,�|�y�\"wkGv�\$����K[�~���\\jDx݃���j�f����޼gl��K��W��3������8O���Pm�<���*η�n�j?ô��ړ�.�D��.na��u�>e��+��Ǩ�b0��z��h��,ŬƱ,.(l&�8���ةyn��O΢C�&ک2���\0PY+�0��8@Ri��A�d�n+��ޏ�h����	�(��)\0��D��o�����ƸͰ�`P���/�֭��P�ްb�������͐�\r\"ާ^`������G����������m�S(�@�xۭ}�pmV勃��p���ӱ\"�.~��-!s-D�-䰭��Ю�KzȊv�������f)�a��qN�q��`�,e\ro�P�ܐp�H��G����#\n�B�qP�@m���ڡг.�Bs��&��D&xp��&��+<��\\Wm�.-m�Jxg�I�5I�J�dJ�.�����>=���z�F�4�V�BuѢ�epDE����Pf��h�F^�\0���=O��\n.��b��a���Q���niq|��\n�|�g�Hq\r�����Zd���,�-ǡ!�Q\n~�у��uҰ��jqO�z�v뱛�,h�:җ�zt�����g�sR���/'��.fBueN���5�bc�Lr�eT-�+1\"�1b�D�r\"�nn�%�(���F,Y�[��(��(�Q'���FU�'K�)���]L�S'�W)0Rp\$�sc/�g*�lZB�;FF;S33��-�0��.�82�7e���,2Ӓ�b9��k���xgg4����lr��6�sP��.�r��y�,�>��7���˩=��0S�0��)��?��<��:�:L�ձ)A.T�2����R��k^CF�?�4��\nk\r,X�L�&�?ӉA�y)�?.��S@Q�@�I7Wm�sn6�9�4��B��Te破6��1Ӑ4J��\"\0L��?t],!H��F�lr�#Q�L�J��Kk*��﬏��v��AAF��L�ʦ\r7�;O�L\0 ��ZQj,��(�f�\r�V`�\r �\r`@��Ԟ��\r��\\/F\r�n\r � @�����\\ ���\0ć��\n���Z\0@���S����Ot��muJkJFoFuL�mP�UWR/W�W�\"�Յi��\0���)\0lqx���O������EK�a,�%�N�Zr\\���b�c�As�+;A2(�ml�4��v��C&�4� �4�E�Hw`	����a�f|���ź�q4�#kQt�k��O���65�Z<5��f�'�Z��CN���Z7GD�]Zƪ&���6j��Ig���\r���>UK6�@���ʆO,�V��&\0���G����c'8�6ud�M ˤ!҃*v�O�%Fd�c�,%Ne�<(���i<�_B����y.�2Q��n��?p|;�p��_G	�e�H0�7L��D��NB�X�*�s\n���s�(�M�V�u�q���\0f��\"�l5��Ϋv�l���f����{1'n��4������m�R�4/`	\0�@�	�t\n`�";
            break;
        case"ca":
            $g = "E9�j���e3�NC�P�\\33A�D�i��s9�LF�(��d5M�C	�@e6Ɠ���r����d�`g�I�hp��L�9��Q*�K��5L� ��S,�W-��\r��<�e4�&&#��o9L�q��\n'W\r��hc0�C���1D̆�|�U:M��ц�1�`�!�H �-�|�nɓ1u�(�l��ADs.�t��f���/;M��h��':�κ�Q�#9`���8�ʎ��m)\$�i1�f��52�Y���O�A@9O�?��c����)6/���{���1ϳ���ܠ0���h�/�xꓣ��\"���B+� @1#���1Jɶ����-�P��>#sJ ���0�/���\0Rh8�cb;\r�H�6\r�'�J4b�l�:&FZ�Kc��������İ ���g%�c\n6��k��'�,�@)�\"b�Ȍ�S�A�+�1:\r��P�?*�2��\$�\$I8�G��0���\n�Q��ܣ�[����0�P����n;@�3��@�&����+�B �3}DGM�`ɍ��*\r�[>b��#3p쁱c \\Y��ڏ\$����(�2�6��JcW�5�ʞ<Ո��V��:�������BtT �c��N�`9�)���<˲�8\r.H�/kE��-������{2R��� �e�P[8E�D�0��c��]�Cm�������D4����x��l�&@����ϣ.8^M�������60��XD\"��*ώ��^0�ʂ\n���D:+�����:��m���ѳ��+�2���z8������( �}X�>�\0P��-�h�:�zb)��va\$�����N��@�7�z����1�P�.��*��r\"x�* �\0ܚ�	�s�v���2�\0�wΟ|�-��!�A�����vb7%hK��{rb,���[��z?pKT�<��@ܦ�0��\"'�������)�Aؗ���U�d�`�����[����ǨAV�P�Qў�^|���fMIU(���4�+	�SD����	T�p�Jnqhu���K���* ����1�jn��\$�\n��]�Ѽ��\"�΀���V^Z�k�Yj�!�87^��p�����@L��/���@ib�g5�'��@B�D!P\"��(L�0�,#��C`u\r�ĸ���ÑnIe���pI�~kD|����N�n{N�!�\n@�JN�	09SС�1�D�i�@�0Z�auD3�1x�K�\\�d�'�	a<Q����#Z��RfM��#CqF����*Z�+�҄c��a�E@��B�.��>��b�-�dP*�(Hd7a7\$��0�;z=-���l�LFK��\0����a��0��S*u*�R�ᖔ:��B�@���%�c�LwX�T#\$iN26/�]w��7+�{��1J�B3���0:�Ri�LC5<�U�T�P��b<;��V�hteFt�E�O��MCD���D��	4�U��/9�U�D��)d��IR��蘄@H���*�(�p�e哃XVn\$/���!�\r*�YS�riѰ\r��)R_�я\n�[���I�ĽC���xn��F)%d��bSq��\$��2�\$;X�aV�v�\$,a�,��ۃ�vm!�XAi�b�a�0� �=�R�c�La��7;�V0��y\$o7ɳ�7xD���O�	�h��ի1T\0��G�N1{.xV!U�P�r�ct���y�f\"3V�bk�B&tЍ׌�M��M/|u'qAlnMk�x�j�_:81TT�CM�����Ќ������r]���,S�	.[��I���Ƒ���w������ID���u��)�῞S�qɥ�\n`nL�2�y��4�sbB�U�ӓ������w\ntk�(y�=�����5ӄ� ��tts ���Lj�5RI8��\n��JmV�j�c��W������[��sZ�%lX�R�-G�q�JtsPl}��t��Z_i��\n�6���;sjG�,����\\����]����k��4�12�9�I.�s� )j:��I1l�U@�8�_�f	��.d�oH����z��WpN�t��Z8��܀��2^���S�Dm����A\$�����6~��\\�B�^M9����Rʻ�vm����q�.�?6ҍ��6�~�q�����Br=eX\r�%�R�W΅7/�4ئ�g����[�}7�k�,��f������'��'w]S'��B����I7�M�6NW-��#�<v	腫�U�����ͬ-2`?1j�}���z�7�(��K-HKJ��^����X�]]����I�H9A���n�j�2Xy�!gh�,��)��4�0���?�b[#����E�����7�B�my��%��G� �m�����dw�*c`\r�V�c�\\*Wix�M|� ���&+�E� \$F#�ؐ��Z�V#�M��eR�J�׈����3PU�L�j��b&U�M�E�j�Lx����8y��1#��j*/�0��N}���%��l�/Ħ\$�\$9\"d~PB�~j�N�01��K~��2�J�,/\0��Lw�!P�:�̢�N��荐�ebb�Â��*�kqql�â\n��:@�Y�,1\"lG�*�.z#\n��d�n4�~D\n��t��Ꝍ��%��ǪQ���N�eވ�^�!D�c&\"��I�����^�*L�@1��2��.�.Y+`�h\"2e���8��@	6����Jޖ�\$�q�	\0t	��@�\n`";
            break;
        case"cs":
            $g = "O8�'c!�~\n��fa�N2�\r�C2i6�Q��h90�'Hi��b7����i��i6ȍ���A;͆Y��@v2�\r&�y�Hs�JGQ�8%9��e:L�:e2���Zt�\"=&��Q����ئ��*�EjT����k<��\0�Q��y5��Ǔ�\nb#&�3a�D0����@�F�a�T����M��fPQL�z�O ��zr�+ADs)�۞9t�3���6�L�*�Ub��'l�H2�\r�����(E�&�d��i��\n�Cv�f��\$LU�׃8�\"��Z7�o�iҖ5�JX(\r����\r��\$��\$����.k��:��x�&����lp�9CM��(���\0�0�C�ű|b<�q�`:,��� P�:��[F#8�2�������5��*���,0��X��C���Bba�������xW�3�9,�Љ�\r̹.���Ҋ\"bn�&��\r�h�B�:��L<	A���#��Ґ��9�����0c�r�(���\nuUF�:�� 		B;Lp��\$����È��|É�#�P��=KS�� �\r\$��,5��eL���~�0�c�,h����5��\0�)�B0\\X�+؝͡\0̔����L�\rD4:�v-��=ɲ��4;C�!B2Z�����roB#r�_#�ke�H�'OqS�x�-m 8#PoK�^��.�����;`\0�qcoC���0ԝ��e�(��z��;�c;�C�Ƨ������xx�\$(��C@�:�^��h].\r�s�%#8^1�a|ܞeAxE>C;=��\"�A�y������F#(x�!�8�\"jb��.��oq#�|P�iZڷ�q ��&��p6/��:�M�@��������rN�\0�\$\nU��wb*JV!#fc+D���Q��I������t���յ�#�><V���V�)���'��\nx�*V���\"�R�\\�/��H��w,J\$�@��Hg��;����sϸ�?fB��\$�����rL�#Ā�> ���Q�b`��3P#A�%�p��e}[���!�+2T��爙F J�7�|~�\"�,\nme���GV�L�JeM�cPL�4a��3l��.id+8x\n�:����ǆ�^8�u�e�Ǵv��b��0�H�T�bY���DH�	&�D�]�ZŊA�	������bX!�����Y��X���4OdԜ~�~���.�j���l������H�l0��H�?�`*#���	�'A�Մ��I\r��%���S�c�)g�CVͱ<��C�s�cȞ�E\"e�G�J~�g��e>S��=(��?6B�v��1��ĕC��Rld��0j��dD��7�}��;S�1��a,�ĝ7!��*5Jϙ��4֙ú�H��Ka�&BVÂB_��CFAi��^�9p�L�z��j�<�h���9g4��P�a��\$�!�h�ߋJ����]%Pk��1C3p��^�΋��:�	����T��a�p��K�P��X~�k���869�� ݌,����e=grˑ*�f�<;��H�V�jK;������2�[Y�Ĉؒ��z-���v�XK!q�=��6�X+_s�m���ܦklb\$<��gbR!\"	זL�F?z\nU�\r����J�њ�h(�'��j��� Ji�X% ��⡂�zc�2��2��6p�?@AL8R��ʩ�	���t���\$��*��(IY�A�eke��¸�����kg��2G�W\"Y7�1��D%C �h/��H\n�=���C|DW!����K��#HU?3Ы�>gR�� �n`a�x��ӏ�*�v�R|�#d�A��O=-O��A#A��\n�,�є?G֚��2�+���ifR1��M'*3D��(d4	�Jʱj����~f�'�Cb	Nv��.V\\�����*���+8:�\n(EW)��Hx�j�׎��[IG2Fى�p�P��1�J�q�f�W�V�݋c&�ԏ��_�jh�2t�cuO�zU~�㻑�3ї�!X��h�E��(7��^\r��M��hJ�p�o-/�=q~g-���{�Ba^J�l�&�Ě��9�v��������;�W�su��I��A�5\"R�e�����7f�69���1Q��s=��W,���\"ޢFPؽn=P�\n[��[ dGѱ�ӲCu�U�;�9\0��]+S��N�K��#j��L�\r3�d��*��@ؘ���~q�b��'hׅt}0�֗��Z��~M�OE��]V\n6�ؙ#��s�=4^�*r��\0����'�q��~L�-J�*x_:*Ȩ����; �e���䳧���a���ރ��n�v������U�o���S;y*dj��0�c��d���	\0Ϊ0���0��.I�<jv8nn�mBM��jj�NT�\ne����@��<B�88m�Y��Ji�3J��Î�O\n(0.�oiPn9PrzO<�0~�d�OK��ߠ�\"��9����A�rՍ�~�2H'�z@��]+�\0 ��sкb�´&n�kKb5������:+r�2�d����]�\n��Ep����9k��[���������UB3�Aj�E2�^���\r�V�\"�W%�#�:�f\08glN�F^�<��.�c�d�f~�f�irc�\n���py���R����2� ��W���1��z\"5�~�1.����V\"\$\"��fle����0v���B��#�\".C~��ׅs�\$�#�r-����EO�K̛\"\$1���օ�nC�����#�y�D��� Ī0-�8���,Ĵ\r���m�d���#b�#��(��&�.��W\$�]\$e�\$�4�,VTb�Q�*e\\1�Xs��\r�5d��c�f̂�\$O�a4ԢFL��(B��\$�+b��-�z\n�tcn�Ģ�\n�G��#�;(O� ~Ȓ�H ����C����V>l,)J�rP���#@�5�l�c�u�\n���&d�&���V�3h�o�@�";
            break;
        case"de":
            $g = "S4����@s4��S��~\n��fh8(�o�&C)�@v7ǈ���� 3M�9��0�M��Q4�x4�L&�24u1ID9)��ra��g81��t	Nd)�M=�S�0ʁ�h:M\r�X`(�r�@g`�\\��*LFSe�f\n�g��e��S���n3��F\\tD:�D��4�&:b���q��t���D�v�a�@�9��m��0cq�Ý�i�Sm�v����CՔ�a����,��m�ћ��W�˨��Y�E�N�3���)�GSY��\r��h��l� ����+���?,�D'�������@P���x4Lq�B?N� ��C�J���<�1�J<�&H�B�;�4�,p����:I-�@��O�1(�0�2G R�ݾh£s�B��<�c���|W��\0�,h8�ۯB���00�<��rL�D�,⎹�[�RC/B��N��@Ú	=�3�jۍiz�B�ʅ\$�P�6�·&�B(�J��p��\r������Ө1�c�b��#���#�8�	U�0\\CK@���@#9ch�Hq2z�@����!5�h ���]Y�0ޖB��h�0��:\r���s�1x�K�+u�aI�8�2<P:䖧�H��g��#�7Th*����m�h�7[Òu��+�lݡ����9h�8\r0��_��A\n�0z,���x��ڀ��s�3���*AQ�^K�䖎���1#L�DRc���\ràx�!�A6���K�}�v�����6��¶-�0�9��s#�\n�������@ä���	0�@(	�[��6��\\�B��\r,T9\r\r�����p�'��Ġ�ؐ��'�0��!��\$��HR�a�v��*VxФ�k��'�b�\n�e�0@���]G[c�/s��-�#�\nR�������n�	cTA\0��l|�=�	i̣=�B�#x�Luδ���`%�&bPS\n�e�*@�ʜ*�#^A��AU*!ð�x�C9UD��s�\"Rw��΃���b��\"4*�(Ac�R�	�AY���c�I\$<p��B���c`�9\$���1\r�9�g�lq\$�%��N�s�4A\ro��81�4A��t�[\\!�&�\n��Ȣ���]a��FW�h�xNT(@�)f�A\"���\"�\"U�t7`���%�=�I�҈y�+�\0�#:20�����ܡ�CT���bRS�p~!��%�V	�B\"�8���s@s�h�#q�>�F4���NԋX��I �\r��AU��tb��|B��:��FWQL'��`�Y���h��ϒ�?|���8���B�H 4�AMA(ĦZxeEzP,��fa�o8�mL7t�E\nb��	�`3\nY]��v���4�V�f/�a�\$�6����u=L�����a�@��)�;A�؆�̿�p	�4Ρ:���5H�H��\nJOSUN��K�t@�Q t���:^�H`y[�}��U��X9�F����\\\r��!�yp����i̓�,CsY��5\$V���%�*l�h`�=),g�7:&��z�%V����D��\$5o�1���'��X��ʊ�&O9i�g�; h�	��'�C �\n�ˡIQP��T�Z�J�\"478=<蓃����`^\nh���t'\0��_J�2l:6���Bl�9��@ʸ��_�����:@ܭ	.m8��cрK��0�7�n��ߘHI8L��a��?�NA��x2��j�h�IK�sP\n����!|�6�c�MC}�5g�,\$q�9�Ȍ>T̼v�^FEo�Z�ٷ&�Jnsi)�Щ(���\0�&JPS&\$�*7�]����6�w7(|׍�=Ԇps,�i��v\rh:{��e�mU��ؚ�Tj�۩eΰ���k6���3FכQ􆁫�JAm,]�lv�ĺ�ۉ#�u��V��vQf��q�y,�w�p���\nr����><PAjtɵӯ9 2A���+,hC����l�Ơ�B};0���OH ˁ�\\����B����b����]dy)�돬gv��s��%�j�\\��N��l94�)���,��]45�;>��c(c�O�/��p�z)��ss����>U�y?\"�B��˰��_&����;�\n	A���b�jv�n�Li���9�:Xm�-O.&�G��x��i���-\ru�9�X�3�2\rُ|�(\$\$�Z6.rВ�	�>�?Tĳ�u���<x�}��ss��n��<�u�;g4�9%�:O׵~m��c��:��U��\$�i�h@�̨���1�׮��p�����޽�[�>l\r�u\r��K���b]?ݐ0��L�<Ե����Xkp=�c\$`�cz�o�{�8�2�)�1�H0��h8����B��ȫ��-D���\0�=��\0f���`�jŢP�o�&���.��1�N��<{'ҡd���zX����%�6ʎ�\\f�B�q�\0	�\0X��\r��X��5��\r�%�&�|.� &Lk��9�d�2=CLbJ\"i	-���\r�,Z#�He�\r`�e\rqP��J�&��`Ȃ��	����b.e��g�6\\e	�F�.@�\0�Gb�����P�JB�q{�\0��.���!K�\0bBv7J����jBMQ�D6J;	�Ȳ�Q\n��\n����.�� �\$�#𸞊\$>�vG�~0�S,fƪ1KR6�[�:\\�\"��@�	�t\n`�";
            break;
        case"es":
            $g = "E9�j��g:����P�\\33AAD�x��s\r�3I��eM�����rI�f�I��.&�\rc6��(��A*�K�с)̅0 ��rة�*e��L�q��ga����y��g�M�:}D�e7\$��	�` L��|�U9��u�i�s����� 4WL ��|nœ\r0h(�a��Ds-��t90ո�i��]O�+l�Td0��;���d���gY=�o7h5�lY[��lc`�a��n��[	A��qEl���i=I�n\r�o���N^(���c:Bt���c�m���/��8���9=�։�*���m4\"�L�O��4���*��X�0�<��K�\n�è�1��r.#8䃌1c��n�e���\r�Rŉ�н'Øƴ.kB��\$CH��8��K8���y0#��6-C\n<�IC���\n*)�\"`6�q8�)���\r2�5.TK�/`�\0�����B�Q�+T�O�}\n\n�l��X�����\"�	\$���|'��\n���](�9-��S�64	��5�\0�)�B2B7����\0�\0��rR�YK�6#td�L�2�6�M�^\nknª�60� �1X/k�4L�K��6�b� ��n�\\����*��4�m�X��0%\n�d����X�ՠ@7A7�'C�k��ICeݏ�ڳ���9���;�a(�f��(����D4����x�pګ/�r�3��F�-����S(�3���\r�XDS�>��!�^0���/�����`\$#�2�M�r`�1�,�v���QU\$�_h���E��@(	�\n7��r�\n(R��H\"�9�J�Θ1�\rϸ'I�h�08o��Ό*Z��-ܞ���,�v\0(	☩mqi�8�\"��ԟY�X�:�O�-2\$ɢl�����RY�����#�=r�Ң��U�-#��7�֘į�����`�垙!T���H)�i�X�e�U�3(&	��Ae�N�K2�B>��i⃊\0�+`�Uњc��«8X�̑�P��\$��r±�L�|��f��~#�������\$`�8F����r�*5Ǡx˨o�� ��PѿV/���3*a	�,�9�p�K�cIoB���֍q`���P�*P!�\0D�0\"���C3P	�	/&X�P\$�\r���bH�T*�H:�I�.0�1�7��P�u a��Ă�W\\�<f�}��3��r�FL3��J�IA'+ƱMRkR�&A\n��(`	�l�Rt���v���!O�Zs��W�@\n]���Ȑ�1W�1Ǹ\0WH�&%x3���`'�4%���eF�Y v�ɾ�UF�U	z\\�����!�6J)8�V2pNXDR�,2�\"�t��ED(�,�n��DQ�]\";Oq�G.1b,�CsL.���tJC1����:qQ�-H�L)�S�Pj�Rz�/Cu�i�#\$�tU�(L<��kP�*�_�S:���qIš9�^+s�#��g`Ƀe�3D�5d�+#���<�Eס^�I�	Dz�i?�@�h��Q����jg0�HF��ϛ*SF�������G����\\�B\r+���2�K�-G�堵r���Q����G�q=��̌�|�6�p��˟hU�1e��X����{w\$�_�-\$\r�ɦWNtI9��L�Vs�U���/L�s�u�Ǿ��Jh�x���V7�9�a��*tOx�6��ƣ\r��Q�.7I�4j��1i�ӡ[O/%��\$�`��\"`�����y	uV�1.)�,U:�'���,���m2qlJ��\nq�e��UZ��!\\#̧d��sm���8��z1e,�Y�m��m�V�����ʛw�Ua��2��\n��*M{��{H-��Tt��L=5@�� �&2EmO�t�z�Sf9kKuXLsrs19�TWg�i0�&^㐼M�[��ɧBՖ�Y>^�z�T2��Z���X��'%�L�z�g�*�g���-jմ�*\ra��j�=�!a힩�,O��?6��;h7Xb�W7��o���S��A�\$ʎ��]S�oU&����.>5J8m�ߊ�q���&��U�c�0L����M�zS!��R>A��\r��|��񼮡z!.}�k~E:y  E5тr9�FzW>���\0\"���!�<�]1.L��vQP\n����A(6\$�+������2��������:�{��&f��_�:��<��S�/\\]�yw����	�4FT&XM�+�hU��\$6�{>ˎ��QHa����=�	�\$ōw8_��g�~�iDD��K��3@\\�>�^Pn~�jq��V�9-�`��p�Ւ�\"�F��jb�U놜��)��o䮈�\"���9�6#� �N�\"P�,j���i_��Im�-\n\"PO��0�;��\0��?	0.�� c�1b�W�xJ�bPPC����b1hb�j��>��#\\���s��Ecb�R��@N�l/À�F\0�\r�`���n�HF-��L�0��@^�s	xi`�f�`R.И��\$2���d�>-0�B�z�D���nVÚ���5M�ʥFt�F\"����Ӫ24/@��<\r.��5�*Ap.���B����\nèjА�Pi�7��Ę1`�19X�	\0�@�	�t\n`�";
            break;
        case"et":
            $g = "K0���a�� 5�M�C)�~\n��fa�F0�M��\ry9�&!��\n2�IIن��cf�p(�a5��3#t����ΧS��%9�����p���N�S\$��4AF��\n��EC	�O����T,̰ی�t0���Si��A�\\hg��v�0�l��e3�̳����\n&Ny\\�\n�a9��Sy��t��H0�1�G:6���J�(�e9�Z�n�V�\r��Vd�����W4s2��X[��O�\\͐�QZG�0�-�-K����tJ�6�dŝ�pà�PV\$�J♷��,��*��R������CS�%��������J��ʐ��*�>H��7=I�d�2�ʤ�\"x�O��2��Z\n�+���\rc����\nH�9/\"�&ͣ���5�j3\$3��:��`A\0 ������*�72#s���\n��3@P�7L����r��B����r������ceC@�@�4*5�cha����ˉ#jV9\$�P����\r�� ��9cx@��P�?�(����Dp1&*�@!�b��%I�F�\r�b�*��6���&&��U�Nc�����ܞ�j2jێq0�%C(�� �`�ō��\\��v��7 w�3�j��8X���mY��ʹ�(ʚ��p֮L�^�O�ܛ�mŋr����<I؊��Xш���D4����x�\$X9�����vx<GCtM�R�A*�P�1\$Q DS��\n�\ràx�!�@�;#��7�?�%*��9]�*\nzڵ�9�ȣHm�s8 Q�R�GNki;x�\$\n�ӹn�;�)�n��ce�T�d�ܣ��z�|(J&�0يBj(	☨֑�Sw���#HH�s�\r���h_H����v�v�}��#@��	\$h��#x�K���\r�\$���\0�124��,X�*p��@�S��3M**�7Y������C�j�	�xK�d\n�R��/��\"8�R�U������\\�X��L�!w�(˅2����\\~��5���D��Sb��-)�璖W�l:\"�Ui;���,e���c��S���@�{ê�Z�����^\r1���ξ�y?�\\R#5dX�xNT(@�(\n� �\"P�c��GoN#@M24+��B�qxG��DI�&�2��˹�;�A\\�V\"OC�\rI��;�H����2�,ҵHNhL�s1)�3�����\$��Ku�x�a���\"�U�v���p)&& ��̈I��@˧����Љ�,��ce�P� �dK��]�}2�qH��b5y*#�,LY�����@�B8G�H�&QxN��\$TJ������S�\"�<���g*�<N\ndx�)��B�E	�P)��\0�T\\�%�0��ڙ��Zd��! ΅�9]����u���9FX�����:��!	��TXD�O�a[�=����e��=V��ެ@z�W`YT)e\0�K��c�,�)�m�V�B|��)��P��7N��i�]P��O'�#\$�8\0x۳�3I��6�WC�B.5�;�b���H���iȂ�|���L�\"�~�%I5�����_�qH�9�@H\rV��A����Zg����8�\$AR���a��#��VU�e ��:0x�wS��1a��#ӬP��6׀꘧g,� �RԔZ�Y����!�R�Yb�ꬻP�{ѥj�7Vk�l��n�KF�Ĭda�PAA�shhNr2��4�y\r�����؇�2I�酕\nlM\"�.��]������f6Idp���y\$fy����'%�v���kIn�f�*�R<_X�sx+-��'X8�G����Уh�Ѷ����s��\"�84�\"�E��s(�l�B��U�C���T�-R��nZӤZ��j�-��>�&�\\=':��3�\\U0N���VtH�3��^�A1�#�[x�s,7F�F�Ի +�c)�w�5�S��u�H��N����	k_R��]D��!���n@�hY����t�W[��{���4��L���O9�J��8���\nu-��2e9c�~O�Ӛ3I2S����8D�炌�xv����:@�~V�yeq�Ð���.��R��x��L]B�>M�·)��X�sn=��(��*Re�i������\$�s0K�\\�3X2�^}�I� �cA򺷖.P�=rE�~���D�T^u�y���jq�3\"4K�W<!��7�h%Jx�uD����(J�m4%��ۍ���&2��V�v|�;W����n[p�#y�^S�w+NJ�O���E>� (���PEd\r�7JD^�-�������v�a�Ϧ\n�F���k�A�ee����@Q�d��'�(��^f,ǧ~%r���\\_��\$���� �:�H_�yo��sHn.!�'TĈ���o�A�2ʘ�m��'^�Ie~5\0�`�&l�1�)gƼ�6C��_\0�\n���p���f���jj*a8�@�&�.@C�#k\\�+l����4�T�0�\rN�#�'\".ë+�\"��Fj�#�\"BBb'��\$�{\n�6&\"�I#ʉ��Kd���h�l)��o��̊\r��ލ�Ԭ��#ip�pc�z�`������p��p쿏0�L\0\$\0@�\"R,�z `�2�NB\\d@�j����.E�Ja���,�3ljSƦg�^�P�ɩ(�G %I&JC�5ʒ(l`\nM��d#�<F\0�bLGb����~)�H����+ޜ�T���)�r�B��\0A\0�1DzD#Vm�ZG�hR��	\0�@�	�t\n`�";
            break;
        case"fa":
            $g = "�B����6P텛aT�F6��(J.��0Se�SěaQ\n��\$6�Ma+X�QP��d�BBP�(d:x��2�[\"S�Pm�\\�KICR)CfkIEN#�y�岈l++�)�Ic6�d\$B�!Z�-��~䌄�,V}�'!�����l���UUiZ��\\Ԩ�B�y�� 5M�i>C�ajx�#\r���8��~!n�A�K<|2y��Za��;Q��a4�b����	Cc#'��W�dT�m��c�{�E�d��J�[����)��I,6Ck�`-4u�Zu���Qk?�\"�.�b�lL��@,�&���@�?����L\$��@L)?�s���ZBT-,Z���*+L�EdB:��&�R�4�\"��<q��1\r��D.��������r\"���lC��4�YTè�6��1\r�*61�#sV�;jz��B��I\n���(:җ���b��T�a�����<�t��/����o�`���jB���{(�S/�Pn���-���OӔ��&\$}:�Q���Q���e(���\$�'0J\"�T4*�R1�3���`P�:\r��l��1✕�sȱ�)���(�A �P@*\r�X�7�)�Lℐ���'�RKA�bJϱ�����\\�8���Y,��Q6�Bh�-�&��\r��!4\"x�!5Kԛ�p�1�=��[���V���%v��=���Z8c(�7�h�9��(��;��*2���9�%�!\0Ѫ��D4����xﳅ��6�#v�i�8_u�cƊ7cH�7��0�C8�:k���2�a|\$����6�c�x�!�9���4\r��7�#\r�\r#���\r�/\":M������O�h\n\rB�u�%q\$�ݯ	Hٲ�9f�2�xP��)+���/��)�\"	^ኲ!��P��*sS?n�7�%md��ˤ�����\r�C�^��T�Ê�Vp��,�jj[%���hU��@\n(���>��f}���*|Mӡ&6L7�S\n� Y�`N�,���\"��87��@�Ci��)��0iL �;����P��\n���]3���7��6у�ou���U.UY��g�)�%F� 9 ���@�d��\n��_��b��\"��B�ر���\$�5����Wь,∛��e�z!H<��d�����!��Д0@��&'�䪋�x)��\\E\rV�0I�Ĝ'h��ɉH�ʛ�G �rL��..�:E�A�}\n�� D�q2�0K�*����h�.g�[\n�p�xNT(@�,؛A\"���8��R�;;\"\0�Uj�<�Z�q�>X��M��s@	�#��s�?����2�-�,�2´�YLAг�.q��ВpJNk�<Ó�<�eD�?�m)Lz��W��4:�w��5F�F�\"�K�9����[\"�u/�����<X��.��~y�#P�\"Y=�J�,Mix�m���w,�y �ģ�K	i���=(�gKI��o(ó_ʻ��\rV�S�-�S�M��S-㐆��(i\n��R��8������!�I�\r�VS�փ\"��<I5f�1Գ�R���2�ݘ��:���\0����%��2��p�&*�'�&dk�C��\"#�b�<�^�~���6O(�~2�9)�o���+%y�^c�L��H\rO�r�D�V�=_!�dr@�bw��#1i�d�4��s�����d��+,8%�WK	�@a� �7:\0��L=L.	�9�A\n� ah�t4�Z��\r�O���USq�Zy��h��V<�\r/�\rF����Ώ�+�o��Ȫ>ϙ8�)�1�q��1����A����k�k|pm�I�G�l�'vn�Ŕ-��%	IJ6��\n�h��[��t�Ol�N���S����NL�71�;�Z����r/Ǖim=�V�.����j���'RG�>����̊W1�]=`F��)d��#�td��+��B�-!S�V3\0���vI��xOf�K!h�P%{SFL�̳뼥�'s,9�qj����v\n���*�a���K�����Q��ԏ�%0n|�C�\$�aIn#\n�\0����Hm�U&�sͅx�ԔT.�~���bβ�I�1��-Gh�w��V��3�oH��g7׼��W��u3��k���_�9�1���:?1�fJ�s���P%�%b�)���č��\\��Z�F��c�2�eRBj9��Xsc��Y�z�X9�����͔�FB�.\$#��ʦߊ�������5=�94\n�R ���:y�E���ϝ�syT�\\�=���Ō���k/���k��4a��ER�&����V!�A�\0���@ŕ����_q�)I�A��S����!26 ���ݪ�)B�&B�`��e��^����M)�3g�c��\$)h�-���Z�\0��J����O�xk~`�@�`�\r��`����x ������s����t��u���D�\r��h�@D�m��\n���p�p<\r��u���g�D�~ڰv�0|0-h�F.��Yh֏iv�͸1G���3��e���.�F�J�\0h�\nL�?�4��\$[|*��\\��2b�&���Ep-�����m��P��:j�@�\$�Fl,��R�t@J��C�AC�`7��JJ�������Eȓͺ��	��/A�\n�p�0�,G������\r �j�Z=�<Rq2��>�T�*HE�(/gyЎ�*���������ʀ�rL��MI�\"#\0.m���|<�4��!JX[�.p�xɦJn�Ѕ���U��h\"�/�\n�*T��^����>��ؙm���VĤ����M0���������c�";
            break;
        case"fr":
            $g = "�E�1i��u9�fS���i7�(�ff�D�i��s9�LF�(��'4�M��`�H 3Lf�L0\\\n&D�I�^m0�%&y�0�M!���M%��Srd�c3����@�r���23,��i��f�<B�\n �LgSt�d��'q��eN��I�\n'ͦ#�D0��t�A�����&a`Q��Ӎ��j�V��5�'3�\rPm��l���6ar;�Q4�N�\0�̒�L��q�W���2��_\"i�\\��/p����9P�׹� ���ZԒ����_��؝6���:2��2<��@�\$�����Bb�'K�H�,#(�5ccV�;�P�<5k��@�K��\0�1�C�Eр�:#M�IB3�<s�3�MX��\"�ʙ��c|7%	RYe�*J�2D�\n9���p��(p�/��L:�c(�32�#��v���ƾRP�:�eS\$)�\"b�:���|�l��0��N���:��R�R0T���3\"�j���J���*.���\rK��(K+<<T�r8�%��G`D�|KL��\rF��˨@7C)��<0����/��Gsد��x���)��ܱ8*0\\\n̲z�AH����%clꇱ���{�3N U�:�c-�0�\r�꣰��9���,�MÃN녁y�ZW���?Q�PY��U�eo.[=�(�J4 �n&��;��c�W�8�2]��t41�0z\r��8Ax^;�p�2\r��l���{˳M�*B���9W���/�k����I��^0���7�\"��� �q��p��/��o�R�u+�\r��.vr��m<����@�������B���:�h�ܑ\$��Kh1lo�_�m.��(��\$�[��5w~���Ͼ%��n\"[4�H'�b�v���s�x�Ռ�c\rz�	大��ʎ��>���'Wd���c\"�BU�c:�Ŀ\$�DNK�\n�,�D�D]Hl\r�}��� L)�����;�+�H�&R`X�LH���ft��	\"��RpQֱ�[��\"㸇I�.��%��~��Il亩5b���<1�\r{��J���1Lf�k���XY !(0����HrLK�96�TH:pD&��d�cp �Q��C�LMY[\"\$:��K��}!�Ұo�I�A������9�u1|��r��W��i�4�p���I	5���cP��M��K���P�*P-�\0D�0\"��0��L\r�H�2aˀ�T�\0ˏL����y~��<n\$�3%±D7�z2��R�Rbf)�0��;B%�}�� ��Hp?�,�1(\0IL��	��K���DGʆ�ଃ£��s0����Q��BJx��\n@lH<�0\r� d\"���A�����*\"_/��WMt���m.͡*s_P9�\\�<9�l����0�L��3\0��i�O����\"C��.���=��F���Ap@�\"7�(r1�\\�?�\\N�jP)��]Q�-��}>�Z���*nD��벓x�@cf�9��[pm��M�����+h�T�kl}��b�ʸ+f\n=��q!�ShOi�e��Ţrn�+͡2V*���7c�]���z�Xk�Q�%������;%r��\$��D�V\$R�t��9D�a��¹W��DS��vU��c�cJцN���Q�}�e���Q2n� F)()���T���W���[��R\n��	���j'<(\"�<n���N�P�6���@�8�J^i8��T_�u�\"�A8���T͜7�2�3V�	���¦�\0��ټf')\\��ʯHHtq.��#�aS�xDA�F�,�s\"�F�(�0�_���L�+4,�	RG%���O��E1	9�\$�!D\"���{�d�B�ug!��B�2���j�MiT��i�I��Ы��U���`�f{��+S������'SKT,��I0\r���ʒo6y&%}7���l�M&\\�}\"��!:6!��9�^���ib���k��EJE\r��6�\nT�'mne1Y�����L�]9�~�{E��!��^*���7F�[-k��%�l��\"�x��<!pk\\K��	�oh��) e];��J!�]�x�8�2�T;����%7�VS�[�1���d��*8Q�Hs�\$,ɫB�[�ʘ\r&�׷|�\\\"�7�l�b{Ҋpy�����zL��C!<�dC�ᛯk>ۿn�@͞�u���O�⥓3���\\ӑsy0Y�:�T9�v�/d��)s���1�(dE��h|A�ϔ�:\\T�Z�M�n25u�TV<U�v�Fǘ��zh��/��u��z}+��1S�n z�j�t׼�~�ߦ ��o��\n����4p��HX �'�Em�8�\\?7x�\r�q���G�k�c����^v����9��J��D^�*��t��w��(����}#0��`���ª{�ب/*�\r�wP���#J��6�aRg�J��2�ʉ\n~�\$��������.�� 8\$�ԏ*��/�e��MP,����q0t�Os��b\0�5j��\n:�XLD� ��\"�Zς�m��H�H�y�\0P�e��m|�C�EdZeG!�ؽ��X�h��l�N6��[Fl!0��.6c2+��i(\r)^�G\0'���<��`�blG��p�)��\$� �\0��Z	�D/�~���\"Ruk;�~n���J��hW�>\$/\0�(�NI���&Q7Ĕ?��7�}l8%�Qvm�+Qv!Dn2Q�-LW��!�n���k� �E�4��\"TEH�e�2)��|*����|)�rs ܯN8���,��mK��ki\r����c��(�'��� ��3�@�(���\r��L��if2U�E!n��o#D�IĜ������B\rH�m�+G>텴	�Л�T\$���jN�j����4.?`�(�f0��\"fF��\n|���K���|���D)m�'|�rX�r���B�f<�BV��a\0�lH���D�\n@�	\0t	��@�\n`";
            break;
        case"hu":
            $g = "B4�����e7���P�\\33\r�5	��d8NF0Q8�m�C|��e6kiL � 0��CT�\\\n Č'�LMBl4�fj�MRr2�X)\no9��D����:OF�\\݆���Q�)��i��M�8,�Bb6f���Pv'3Ѻ(l�QCh(��H*�SI�������c)�L�� ��Br����Y-'A� �'CR�b�F�� QPh��o�5�(�(�o'�f�BB�U��Q�VT��G��\n*NY�d�t9Mr���6N���1-���Vێy��R�1�����m�M\rI\n�����3�\r��:2(Ӥ�A�(ȃ&��	B�\$-5��%�#��ܾM��7\rc��\ri��2��+��yR�C���7���9I��7,�n-�X��\r�x5��C0I[(3���Bi�X��b�\r�bB0�(@9�c���\"`@8;Sr�\r���<�0d�7A�KW��c�?������k����͊tjb�<,v���C�B(3],\n\r\0�4�8�:��|Z\$���~�JK�<VN�d�D��#��\n��C\r>�,C\\C�P���9DEL�!\0�)�B2`=\r�u\"�ap@%��`�	�e���[��9.5�蛊j�jYU���Q8�0��H�5�CX@c,�4�!H@��*�6.��)~%4Ą�#*n&�X\"��CR(텁\0Ԕ!��=:�8Av��iZ����\rɃ�Wdkڲ9Nk��;���\\\r*@�s��Ф��D4����xﱅ�0ڵ#At~3��F�<+#p�\r�xE3�X���PՀ�1O�x�!��#�w	�iӤO��5G!Tn'-Ke�>�Y}�#�Z\nʏ8��),|Pգ;V7�\0�\$\n��� L^�bXhۀQ��|�q�����T��k-��2iD'<�\n���\\Zn�S2-�&\"��)��V�Oym%�#�&0��3V�(�L�����K��]D�Ő`�_ʲ�\"����Amh!�����iKM8�%P��91�Qܦ�&OU�Jr��9T�l�K;ZkU����qE	�)�����j\rd9�DO�\"�gh����y`���b~@��E�@�P½�i6el�=Ҙ�]�P�ň�+�)ͩ�Kj%#�W�A̡*H�Է�\$ZWT@-.��V^���hu�E��\"��ɸI,�U��������#�{Ԓ7JЕe�b�\n	����L��N����b}Ehp��\$D�Â*E��:�5\n�*iX�p��^�O'����t�hM�Ρ#+ɘ̞T�SjqcD�l	9�2�t�s�JH�vG�%��S5��.2�V���JDi��P ��\nQq@9dfغ]R��#*�d�� ��r�Ӱhy��i����E(�	�ե8��³C�����O�H\n\nS�*���y8f�ڛsrg���K!��R���ZA���5��b�:oCX9!t'W*�kG󮪔z���Z�,+ej��-�h�r�VZ�.!1��b�ҭm����K����Wr����}����Xk[=����X��cT�snv1Y�5a�q�7�\$�:boV�SR�M�n��f�2�x#p�N	��&D��G�\n���h3 ��\"�j����@�ϛ�K7@�0��1mU6+P�#`�eE�4����a��A�b���>e4z!H0��c�X��Kg������?� )LJ�a�`0�(�E0�a@Ec\n�s�ynq����Ap��sT�}���� ��MN9P����ى̛J�XՁ�v	(QF�D�wq��g�3�~%<�u���H�Ή��.4 �Ix�gҗ@e!�j�>c�b+&�D���/\n���@�v�B*\\*퉳BQ,��i�Qk@g�WR�T�g��l��Z�0x`�3�rSS�]��EK�vf�Z�������\nH�W/����Oի(S�J�Ց6\"���J�>�~��P��ݗ�ĸ�Mf�=6�8h>�̋�ev���&����hk�	ڥ�Jm��g,Ub�ƃpY\rǵ���ۖz����(��_�]�k��h��q�OdP	'�hճٙ�`�\$C�Uhl\\@�+Upn/�p.\"�|%��\\nٺ�N�i1�b�3qn0´�%�)1?�N�]�V��ʦ;B����4@eh728�d���\n��L�f⶗ UP�ڗSE\r)5.{����I���3S*��N{(�{Onɯ�m/5R�H�S���t�Y�����u�u�<+5�^/{Oyr�D�G�pSq(%����0�b�w���I�|ݔzPǇ\"�p����S˩�;	9�;��x{n�����.@2�>���\n3a�h�|�����y-��´�V����_5������rC��׌�~�~k���i�ݟO���gr��;��k�:M�|���0��v�N��o��P���/i���9��b���29���`C<,D0Ȣ�b�LH?���0<c@�F>0K�>��T'��t	j�\\@�gal�k�h\$\$�pVB' �d̴\r�D0�����0�ޫ���<\0�`�(\0�aE��\r���l^U��\r �u\$��>` �)Fl܀�\n���pbb�\"���^ވPVb���V0�'���G)uFt#�@\$BH\$���HM�^&,�1\0��A��9!B�p\0�~~d���2w���j\\QB�{F����ov\"�6&�x5C\0��x=�z	�-p\"2�z\"D~MC�?�v��N�ʂ)K�Ȫ<�Ҹ`�/�М�XgLޏ�nJic\rrdL�.�`�'�,�1��Q����Mģp2MB[)��=F�Q�RQ��G|�\"�E�*,.r�h�H\$�	�h�`�zƠ-8KD�PB������#麕@���(80	\0c�K#��#��r/%h�q�Q��¸׈zd�ga&Q�2\"��Fa���\r�:����(1�\"�&vh��\r��";
            break;
        case"id":
            $g = "A7\"Ʉ�i7��ᙘ@s\r0#X�p0��)��u��&���r5�Nb�Q�s0���yI�a�E�&��\"Rn`F��K61N�d�Q*\"pi���m:�决y���F�� �l��hP:\\��,���FQA��yLFpg�\"Ӂ�t:��gK��a3R�R�D��e7�1��U��m�I��b�ww�N���Ƀ�������i8Iͳ��(�i6d�-�3���+8��T�E��N�;�a����ܖc�%Y��֬�\n2IiWM��\n#H�[ќ�e�}s�6� c�@\n��ꥡ(��:��K�6�M�p5/��5���!-�64�.���\r�2R87�:�����&C��,���礎zʛ8����cZ��C�� �lT�ݻ��`�,c�����P��,N�08K\"\\G#2r+���n�\r���2�:op61���!(�)�;,�\\	cJ�6���������JjN45��6L	`���L ����0�H̖\nt�AH)#�X�����9�!�3�)`�%���>8#\"Xَj�d�c��=#(����@ cC�3��:��t�㽼(P�ܓ�����@�\r�*��Q�3����/�T8�Ҹ��C�x�!�3C@��{�!OH�r97w����ز�*�+aSmZ��(�8(	�n��c%0��\n8S����吭I`�:��\"I*\r�04�\"�'i��W5q+�O�Bb0�\0�0�#]\\���X@(	☩�(��f�Q���ꂥ��&�m�M�����3\r(���`�`�7�#:��z���C8A	����#\n�SU=K�4�rC�2��W\"[4���y?t�vܓT���5t�����&���[##Q�{�9�;Ȧ;�EM���-Z2:�>8��X:-���Kv�FT��Ղ+M�����*D��\"Xޢ>���j]�ҵ��\"X�\0cD����gxNT(@�(\n� �\"P�`�\n	��&@c3��jf�a\0��GK\"\r�P���}�Wk&'��I\nBq�D<����I�~\r���f|�, k\$E 7��\"m//�� ��I{�\"��<v��#rG� k�0��~�K��e����#b���%�&ԝ��QDd\$BIcX!��\0�lS4�}����L�(ppF�Tz�����\"��)�x��a�<w�A,\"O񉢲�HA5hQ}�Y*d�u����u/�@����j�H��\$J@�L�j�Zt�*�0@��/<SQ��\n�N��U�\nL\"c��F�0�B���'0��10xLx�Y���@)H��AO9N,���S��\n�#;��b)t힣�p�G�cV���;Tl��Y��%)h)ң��ۊ�4mY���ס6a�8@�TCD�;�R4B0Bij6(�,'�F�0e<�v�2���M+0��I��Ф�x�yeX���'A�Vr�X�Q�FDd��Bv`�LL���F�\$�MPAh�bT��y�V�ä���p�Ʈ�6u\n	�Y��bK?7F\n*<,��Z��]��a��\\�(�qo��5hB\\m}��6L4�0�n-A�t���~rj66��B!��MDe���h%D�?�����e�	�!3�uQ���2��]�a%�YA��:��v�Fo�n�WȄ_Kco.+��0�Jkeo��P��!Ϫ�C˛(\nz��� pH8 \rVa��� n��Vtd�2�3��\n���1y�UgR��R3��|��,~�e�/տ52��AE�Ƃ9E)��%m�7:�_j͒�>M�O��89��I���J�߃K\"���˘,ȼ�}r�t���fd�]��n6J�JL�*MRD�ɓU�\nGDs��^<����%�1��-�T�d�3#��Q]�H2㑭*G����,�NBp�k�~/1���\r�c�����V�u�4�r\r1�QGS�9���jF�RB]���Ɲ��+�����٦��P�*�*�����8�k��M��p��3\rİ#��9(iK-#t�I�7'��n��3Xc8!�����&Qa���� ��I`FJdm�<y�T��:�i��jEeʌX�`a05C�����\nWL�f������>\\+G�&����5\"��@R� �Ʉ�j�Nq|0���I%'�i�H¼G��T뛜顺2���`�V�Ǣ-]�w�.��T��l��,�wLtr��-�M�N^T�BhVG��Nl�[񠀗#�O\"��W8(�	wv�Y�&�C�����g�_/��/9�O�K���w��z��HI���Xi�a�Y�f˰�k�7�Ø";
            break;
        case"it":
            $g = "S4�Χ#x�%���(�a9@L&�)��o����l2�\r��p�\"u9��1qp(�a��b�㙦I!6�NsY�f7��Xj�\0��B��c���H 2�NgC,��u7��F��n0�D����b��%��e|�u0���;�8�����5@A\\��Αq��e�jx�~ i̦�Ӂ�U' ����v�\\��lABts;����u� �tgH��ln�\r��)�=9�iElU��i=�K�C�s�r9P�����M�CLx�0;f{=��HAf�\r�Z��12��DS��ߐ�w;�)�@1*����\n��>\r�H��è�\r̀�3���0�@��;�ڮ7#�'�N��;�J*�8Khڕ�0s2�)�����P��Pk���jR0��s)\"���(��P�8/+��;<o���=\rx��1��؇&	L�����֌RР��)�	#h�,���8O�T�L��,�J�,5Ϩ���60`P�7�h�@!�b���\$���\$��\0�2��\n`����4�+2Z��K��3�(�뵡\0Ƨ�ƨ�czؐ���n4��rF�'l�B���Z��2o/�##d0��\0��\"���9&��7��l�2ō��d\$t�ލ%�jt�A\0�ӵ1*�<L,2T!�`4B�0z\r���x��^�Ar�3��:<4i�H�R\0�3��X�1=cp�Ө��>A�^0��(�2�C��	�*%w�\"\\)k�����>�� 'Xs���5j+�B!\0�\$\n`�8N�̪B��#���J\nZ* �%����MB(3����B���p�	\n���\n2�6�'�b�B)\r6����Ő�[�\nU�-[�2��]����9C\r�9����:�R A���}�o?�H�Ibb����0���\$�<h��:�\r�c<�c-d�����+az�N����jZ�ѭ����T���D�E�\0�]��}c8l}�㳛<r��\\u��8�.�b�k턣#��Ԏ�WFP2�H���\\D�7��ZMԒ�=F!�#Xک`U!�0��V��CZF�+�<�xNT(@�(\n� �\"P�bc��M܆�NY��\"M[E\$S�.FF� ����#|1�c���	\\Y	Av+2�J̄\r��!@Ҍ�Aa0h�)�r��C������H(Oi�]�@*B#֑�j'	!��'��~�\$� &@)��ۊ�6��-�C�d)�Y��*@�IT�yREu�)Q�Q疆������O��<(t�|G!���������5'�T*�����D��!3�����]0�2�\$2O���DA�<�\0����w������kAp	>��:��5<g����Η|a���'kL��Bv���sI���X�@�&z���_]CbW�aN��8�eFL����WQ�o���5N��������K�o\r��M�-)J��!�t�s�SH!y/dp��B�(b��Q���}�-I\"*�\0�q�I�ǘ�tr�O�<*��T����v�S)�3JxQ��]%orIت����\r\r��J(gpI���B]�H+P)��g-5��H�Z��j��%NܒǨ�	_!=*���b�����\r���ۃ<c(e�\n�\$v]bY�P�*�z�i�1�|����i\"TQ_weh�^d��Y\r+A�Ӽ���j�D�`\nd[F�(�^�E{����Ba�}{��+��R0fg�.����t/3s@��B���[�6��H���8ria�4kg�FtEgQ2�Kfbw��2�Z�o�69���z�Ļr�;�\\��0��7M����F������e���h;�:���Ńޮ��\\k9|�т�|���G/4��;�% qfГ+5��̹���%K��|�t������\\`ĸ+�0�\"s�_r1�^���2m���?�٫���ڝ��MW^�N��5T+�GubtB()��+Б_\\�����@V,��U\\m�����?����fA��l��a���wm��Ƿ���؁�P�M��w��f`����т/q�o��jFݗ[�q�d(hQ!����*�7���G\r���q#I�j@H'F��J�o��Tg��Mљ'� �ڀ�b	M�G)���uD����@,ŊI����S�\"3!�SB��9�>����S�&WF3\$���oxF+ !�0�\n��a��Q�=7������㊉\"\n��ꄔ*�@�A�P~g���Sel�N����5A�k�	s�q'�)�l�7Љr.��y}�%���~q#�y֡�7�Ʒ�C6n��n%���\\<�k@W2#�̢]g�r�\$�b?���U�ϊ�9�U5��V\$��_��/����2���7��Z�5�Ad�rR�+�����I��4��C��07v�B9J��b0��:d�G ��Dj�B��8��/'(Fdt,����t�^��8\"��͒��3��O(�\r���%�R�l1�J�����.B)N#�>+����Z\"�	\0�@�	�t\n`�";
            break;
        case"ja":
            $g = "�W'�\nc���/�ɘ2-޼O���ᙘ@�S��N4UƂP�ԑ�\\}%QGq�B\r[^G0e<	�&��0S�8�r�&���#A�PKY}t ��Q�\$��I�+ܪ�Õ8��B0��<s�W@�*TCL#�i\$\n�AG�S�,�ƀA���B�\0�U'�NE��ΔTOR�\n�^z�R��82Y�r�2��T}sDU{�\rUA.#�T���9SȺ��_�!�9�	r�T+�*T~�Ď\$*�m��ʐF�:h��D�w����K�K\n��z�\\9�ɧ:i	�ˣ��<s܎7΃����Y�@\n�&���\$��'16Z.��%t!	B�I@B���\\��a8s�\0� �Q�[�I6C\"C @��I�@�1�\$�Ds2`TdC:�I�R�9hQ1e�vs�{`^���2F�ѣB[I�\"z�4\rHt���J��Y+B0�6\r�\0�0�C`�c�7B��&#�8O?ɔ�Kh4�r��L<P��;�RB0�`ӐI{�A���=L�I�Ht���EA'4�%ARt�.�ڎ�ʨ@Q\$F�=iB>�6�G�D�MWD�����Ǳ�6��\\�1ZQ��P�)�B3P߻���4�@4�B��ΡG��փLH���%\$�ԣ��T��D�CSI�W��\nK|7��@��\n<@�\$A�d�ĉ�?\\\r|A ���h<BZ,7�~���p�w.gb��p&�#��2�A\0ᤎc��9F�(�8\r#��2�\0x0�F�3��:��t���# �4��`]���x�7oCƖ7cH߾S��9�(鲋���5�A�6��۽���^0�ʀ�r��7�à��#\\�4��v�6���\\��e	�^�1R�r���\$���)�(	�S����vtw�y�����m���%��a�d�̞ �|T��y_�w�R|�(H�<A\\���i1�[xmǈ��EE���(�@�>�a�3�<� �	�L* �]�	5\$�@��#��fKJ��� ��&�����6C�\"-�\n+_,*~0m���z�X�b!�:���\0ur������Hg\n&\0�S� ���`�\"pnF���57Z�\"�r\r�>4��ݙ��\\��-2>�P��X�-hT\"DR�\$l`�\"#֤}�\$�l#����)�X�L���v8(�e��J�-=L(�Apa�0�-�q\"\\\"����𨣄l�q�!�jZ�@@���y���;�z�I�eD�B< �cd�1QN�R��IX��Id��F�b�^d|r�K�X	0��\\H��6�PO	��*�\0�B�E�3�\"P�h	l4G\\쾑+hal7i4��*!��I@\n1�%M|��r�Hl1�X&�V*�`��R�7���d�'��BӀЙd�(��l��*d(G��y6��'�jj4���T��Z��J�5�~h�B�n*؂����ڰv��d�wU�h�y��x�+�|9D8�U�l�ڀ/&�XTb��p�K��X�Y</Q<�#�аU���H�3��b#\r��4�9��r��4���r�iX��<� �F��X:G�h��5���g�^�ƵvN��4��\r����C�R�Rk�%k	��3��)Wb�A��u��.ÜB;a�`Й�Dr��t4(�I+#�@�qZ�.(�����~@�@�����We���(�+�PŁU~w<�L��U�*Ͷ��r�2+P��� r��vF?b���f���!��>q	�X���\"(y\"\"L���p\0�<y�����9OrVLQ\"����\0nt��9����K�t�\$8@��Ӱh\r9�<'�f��\\1jEI�|X-���y�I��Y�x�ƴ��M�����)U,�t�Y�N�z0��U5'�^��ZPA��/d��Y�F�	p��Te��0�8��F�#�i˖�G5R�՚ѓ��#Ii=C��M�\r�6CTN��\$К���-�`�J���ƒl|������f�h\"ok����76MG�;�쎙�/pn�Q���޻f��\rB9D������C�%m���(kQl�U���o�7Mj���#ncr�����V����9\rTA�c�HqRd聞0������f%hHq1�M�2�F�@��� r�xW��-�����Ĝ�U��^.��n�I����:'F.�&�?��i�#��F��KB�H��dA���n>��W7�w����-��ߕ�S���}��p��޹>O��U�᎒Ac���j � �F��W���&�Q\0�@r���*��r.�\rD��%`�G�⊟���w�Qi\r��N��V#\r8��9��ސ~&BD����G�b\$��DJA�*-��r�h�)��\$�ߝ�V�U�s�;���������O��H\"x*�5@Al��;\0��\0��C�#��/	�\r��þ��zV�X�Av	L�6V�r���D�,�k��m��nK����B./�Eڪ��I#\n���e�DF�\nL�̄�m6e�\r�V`�\r �\r`@ph��@�\r��Ol�\r�H\r � @u�fȰO`���\0�uh�\n���Z\0@o`� ��f�kLSEvezTpT�������\$��~&�l��F��e 0+��LŤ�!kp*�47�p'�c	�����ț��N���� �<�D��\$[��\r��ioqұ#v��q�ӱxP�8�����\0ۯ(\n���>�̱\r��\n����\r �kgfU\n�d0���k�&\"I��b�n��*Z��EĞ�1�-.;+>���p:G�Gg��l��>(fJ�% CG�@�Q ʡL�Dq���0��y��AO\$ܥ��-�/����>�O�4,N��t4!B0@";
            break;
        case"ko":
            $g = "�E��dH�ڕL@����؊Z��h�R�?	E�30�شD���c�:��!#�t+�B�u�Ӑd��<�LJ���N\$�H��iBvr�Z��2X�\\,S�\n�%�ɖ��\n�؞VA�*zc�*��D��\r�֊L�����=qv�kGZ�)Z�Zg���\\;�K�	X�M*nH�]}!rE��@S�Y�O\$�|c�T��'nI��9PXX�Ʉ�u��;P�\\6�RlҰ\rS�	0Yg�삧-Zu�����ְ@oQ���m��n���g;/u-�)��0�u-q��8��L�>�_y�۷-���	`Ζe�`e�\0����/�d\$D�Z�0aNF&%#`� H\"DG1%9\"���a`��\$S�Bi� �A؜.QR�!��A�,�TT&%�P�Y@V.D�[��Y8�B,�@�4�2r�=lbȢ0�6\r�\0�0�C`�c�7B��&A�RZP2��PHD�J��/�N�P��v�E!�S��GQ4�%J#ű(u;�v@�lF �A!�<LDJ�l�����,�\"�A�K��JC�'X����Z<M��Q+�i5C`�9.K�L]�d�f!�b���ѩX�b�B���iA)�/r��u�+]u�Đ�I:�9l{\"� ��X(7��~�'YFF\\�����f	w�W�kVŵV��&�#��2�A\0ᒎc��9E�(�8\r#��2\\���\r���C@�:�^��H\\0��h�7ev^3��(ݪ�8�9�#~�MC�3����/ͳ���H�8M�n�:�x�*c�A��@���~�0�sx�:eY@�9�ki2��A`���F��R�\n@��q��J\n�SU��!Hv\$Ų��h�<D�\"<��K[	%�j7\$�r�J<��jZh�&I�\\R���@ue��s,���~d�:,~1x���)��d\0�}A�B-eb�v�%�4�|�;Ħ�ꏳ杅%tkP�7���GR��a){n�S=�ƀPY\r��' ��p\r�03��C8 N��3���iga*9��CKoe�!Â\0��xmN�;5����?O�d��o�I_%�X��e�B�{G-)�8��˛�ϡCD���z7b�=�5+�,]�,5a�1ڭO�\nQ)��\nT���qHb%XoUР%EP:��k�r%Qz�@��re���!fC�Ȩw�9(�|_�lUJ�D�a.�	�^c�L���-�b��i<��P�*Yk-� E	�^��<k��%�Xi�)\"6�\\&�\r��b<L��L'U\\�7��\\*\$\\��b�L�d\\���e�{�h��a�A1�	̉@h�D\$Ǵ��bp�����l��R��V��b�_ڝS�wJ�\0P={���O#ށ�|)�uu��Ԃ�����P(3�p�\\wb�v���2�����s�lX��_����|R. ��J�S�|S 2�,=YT�j� �)E�\n�*\\�c����;\"�\"��I��SJ���쩯v�֢	Y�m(d�W��>��X���4YX�!\"]�V�v����K�4�'�\$]��.J�̬\$R��Y�!]	sDq��[D�\\2�'Sk5�y�2ĔH_�)�Jf:P�Ȭ��@�&õ;TVA�٧��\nQX��n��_�����j%���#-��!˦/bU֫�6�	���h0���i�)��7��d,�5���bna*�\$�)K�&�A]a����Չ�Kk�*���Q���_��ռe���(�	UeQ������*Q��7_bz����\0�\$�_�qW���~���\$�l,�̌�9�\\��Dќd/q����n�Sy�\nZ&��dj��\"̋�z�bL¼�|j�UC\"��b��P�16Sg���s����a�t>pYz)�e������)ϗY&�u<��(��g�ʝU�woKb��Zh�� �b)�jA�褮�Jk/!|g�����4_9�5���&������#�aK�d��	ҙ6��'xY��C~b�3���&GA�j��|�b\nA����DX:�HW�+�WqnK�>h�����*i1\r���OJ����/QO:�mqč�ћ#ޱ�-ʖ��4Ǌ�~!u�o�\\oGl��Ì�ӫ�O\"��(�k�*HYX�� � �m�`�gi�=+|�6�-CҨJ�����+%Q�8�|�%u�P�9�:r����*Yם�d��s�H��#�U�[@-qH��s�_����_��;����;���������P*�9�D�gIEQ�o���ԟ��C%\rߩ��L����(�N��`�GT1h�K�sT+�pÑ\0��|�ݠ�k������xL�9�����w�\"�kL6��Hc\r`��A�PC`uM��6����� p�#Bd�C�&��Ap�\n���p�o�\r��(*�Uk�U�X/�\\-�LW�~�!: �l�g.��NE\$VAhA�f:aN�AX ˚EDN_�Z�E(�%&H���`�i��Pj���f�@�Dֹ�rAdާ���n�E���NFN��*��=�\\!�Qp����o�1��0-\nnJ�\0�� �oK侏�j��\0� �Fna%2�)�z���ސ�HD���j:p��#X�-��qLA.1�8IJ���8�����!(\$GB=��@�P�	��3�{-�ވ��C�����:`#V%�G�X�b�κQ\$B>\0";
            break;
        case"lt":
            $g = "T4��FH�%���(�e8NǓY�@�W�̦á�@f�\r��Q4�k9�M�a���Ō��!�^-	Nd)!Ba����S9�lt:��F%!��b#M&Q��i3�M��9����\r�Sq�6ib��\0Q.Xb��'S!�:\n)�����D0�\"I���CJ�YF\nSb!`t�%��e5pU��(�e7�sUz]�e���,�^V0���jUt�l0�0LU�k\r\"RtF�H��z����I��n3��\r��\\ 8s9�	Ut�t���q���dΔ�ǟ!��u�Ug,�(�e2L��!�=����k�<���وL�˚����B��Ȣf��o���#��1�L;�\$E.H贁N����3�5�nhކ�#8�1�J\$��z*��ɰ�9>��\r�I[x��IR,:?Ò�	�TT��lj,4���^2�#�V��C`�0CƆcܼ\n\"`@:��[p�*���Ob�#��3�ϳ�\r@�+��p�	s#܏c��>���#���8B��{���}3M�.X�\"�j���BH�8*�p\"��e&;�K�����P#���52+ȳ\r�X�4+%N0�����9\$!�2l��\0@!�b��6\r�Ҷ9��\0�9&c\\T2��AgK����֨ܛ<��@�6L�H%>I{a9�:��r�|��Dn�\nc-��-�<��d��O�ȌXlv9�F�}�6\r*S���8�.��5v �^�\"�����R�\"<��v���c�����[��c�����¿�x�����C@�:�^��\\0��j�Յʰ�����\r�H�7��،���/�Ӑ�հ౸c�x�!�r��C���]�V�0���եjʒ	�����cNj�,��H�\$���,CB�@��Z\$�;���Bt���\n���7F��ij^����6��p�6;�{1��{�O���'I ��?#��\nx�*j��S�q|�\n�8o�4��0\r�pj�Ԛ�(ECpf+ȁ��\0ŏq�d�5����è N!�;�0�� A�+�:����)��Q�C��˥#��А�Vk]cH\\g@��'����\$8,	k��^DJ�J,�l�\n�\$FR!,e��Z͋Q5i�����2(H����`���/�	��B�N��XA�9�Na��v�@rtr��Ad������htYID����J�L�ag��wL�4��а��S�I\$	%<���2��L�6w�ZNA�Z���.�)x)���b\"�k7��\r��Ư2%�\\��t\$�:�q���ʄ�l�\0I\r���U@JxmU-]��Y�^*Q�J�%�#@�j�@2�����ұeb�<��B�(#�x���Μ������\0WBd�x�	�hCgd1��!�\ny\n�\"%�Q@K9� ���L�'ӱhB�V��,C��\n�]ĕs+Ng俨�b*��ޑgqV7�Q^5|��X�2�]4/�Wc4h�QZA\\Dױ��mDǩ�d�\r��6k2z2#���{e(2�t=)��sD�\\W���`�`(*ג桬%hB�1�u,c�����	�\0cE�z���Y'����G#ȎĐ@]g�r|�(Z��[Sl̈́BR�R;\$�Ԋx�5��\";�h�����\n��kc^Ѐ�����\\�c�-�\rvL����4�d�0]�3xY�;e��M����c���c*z��l 7Ԃ�@�Ü?5n��SX�!��a�![����`>�&�B�VO�lPJ)!�\n�ef���BK��{\0V\"�����v]�Ev#��c�,Q���w���4%��1WV�:��s�6�9TS�3�Q5g(��Pa��_��\"U��Q��Y� ���.�e�V�D�9\$͋@��|\\S\$�mθ�Pg��[�vzA��OD�\$�\$�]J������v\",�GP��̩y��chy�&ϼ�3�O�G+�m�\r2�7R��~����ty�����LU�\$�*e\"��W�+�8�X����u|&�D\\͍\0�B�!��gV���3����P�F=���u���AKIt�]���n�풏{\0Maܧ�s�=�f�6�R��yV=�l�}̷6%�Ymߓ���`�b�E���=�d��j����\n%�1UmLQK���K�a2�&��%d�\\�2�=8�Ȥu\\��M%q�!�̍��3��G.�ԥ�ZS��!��MK��Q���K��I��)��A�m<\\_�A��DW�����/��_Cg���6|��O?���}k5h`�G�cz�E;��-O��;�q}7Q�j�wR=�;)�n�h�6rUq\r�m�u	�TN��ٽ	������/�V/Gܶr��D}���샚0;�y�EI㽡����n{�ɿ����jM%9�b�&?7⊆V>�i��D�m?�=��F���_�};(L1w͙�`l���x���\n�L�L�Du����.<jj\\\r �C�x��S��F	\"2��.�F;-�P��-�ox���<�F�C�(�\0�8�-4\$��\$F,Q\$F���bB:O�\r��m�+V�V�m�%�k8���<\0�`�f��\r`@phR� �_	�_�j��t�z��D�#�_�\0�\n���p���7��\$��ݢ0�K��\r�Bo#*PޱK��L�!�0u#B0e���ERL�Q�0\"�/�*¾?&���<GmD�A2�e�h1\\��_ꢇ���%�pk��%��\"	�N���KftB�_�*�f\\�vG��J1v8���v\"�Hފ�x��5p�щ�*k�6�����f�\n��,b^ǣ/\"�\n#tK@�l\"�TCS��̃���/ĀHE����®OC:�ȶ��:��PK�\"q�%�r��`��Z+fi	��n�1: J&��6l6\n���F�0��!\n(�U%J-�����C�L=�BdE�-�T�\"";
            break;
        case"nl":
            $g = "W2�N�������)�~\n��fa�O7M�s)��j5�FS���n2�X!��o0���p(�a<M�Sl��e�2�t�I&���#y��+Nb)̅5!Q��q�;�9��g�F�9��6��,�Fl�MSR���q���GSI����ADJ�A3�G̀��.J\n&G�0Q\n�a4�����-s7�`V�..�a1NrC�l�m�hn���f���a1��zi�'��l���t��7gcƨ����2w=)�����z.�R�E���GS��V����f���������	����\r)[p*��\n�+#���H�<�`L2�C� %�Ȱ�:��TJ�)��8-'�c�7����ܭO[8 ��x���j�~90̨֒��Ε�BUD��T�,ȨƓ�\"��\r��9#�����9�Rà�:P��⛒ی!\0Kc99 �l�?FMs������\nC,��	#h��nȊ<Q�V�����AT-)��P�׶-�5�c`��#\nȶ�)��d�������Rv�!��஌�ZkL�l�94/�8Ț�P4J#H�2����!�L�5/B�����b�F���.v#ycYZ����j�V��z9\$�ksH2��2j��u���9�}(Ќ��@N�CD3��:�^��\\���r-C8^��c9�+^Jc�8:c\"�ġ\r�XDQ�sn����^0�ʢ���@ޔ��}�0���!��(蚮l�˗4��m�S�@(	�����䰭��_\n�S��	��\$�e�~�	D��u��#zRj(	☨�i2���\nZ���R\"̷	���b4�<��7���3�b�k̶>����#z+���\\�%3��X\nr�A�ʣ��:�¦ԭ�4ts�x�bzَQ�k~l��MR�����*q��5&Nw�RM�E;0M�O��()�H����˺{\$��:�g^�Y�eM)l��ښ�lu�X �s��O�lp,��r�P��a��;cZ_K��s/���ƺQKXj,�(#��[\n)6�)��U�X��NT(@�,A\"���\$5'0������QP�@���3If�'����uj �7�TZ��)\n�����_�q��a���L�ϼ\$;y��B~�xmud\\6���\n̒�>��� �⑸:��<(��'J)�?�P���OˌM���W��e)�@��Zκ�2���+�-N�P!�e�/��a���~\0)L�#�+��C~�刟TDX(t\"ɬ�3\n�e�T3��5/p@C�\r\$@��=;H�\n3�9K3?9���O\0�%�~\rml�9�Al�\\3������[le.��r���%D�gC4?:(8s���2�ߧ�\n}S�s�CjEi%��\"|He�gJ�(%����JrL�뿧�uҒHrg�Z�D8&BDG�;�LA��%���QL�ܓ�SvoH\0b{ԣW�J�f�Sގ�����A^�Hr���	x\$�\$E���r������\0w���Vۺ�B��|t�;�\n\n�\r�H8��Y�y>%�D�4��]�3�L���U�WL�5}5���]k'�t�i�B�%9\$D��	�I�%K�n�&ʉ\\6�b�/�ZZN\$\0]��\n�L��5��y�X�uK �W�,g���Ǌ���_�A��XY>J�������J�J���6�[�q�\"� �l��զ��b��F���K.������>���\r��2MjiJ�%��\0��*	��&&��;��AC�-�P�C�A�\r����,��Ș� a<\\V%(-1�2J��&c��'�vU�Pl�y�_�~BH�n��l�2���e��P8:�Y��T9�\rx��̷�\rBR��Κ��w��K����ʂ�G`�6,g�(��}M����70����~�3���x�d�w�0霛\r;.�q�~��ڵ��8����]+�&�nN�`��2��Iv�1'N#��8��5�X��sT�j������\rnK�u6�D��J\$\r�f���r�w��P��L��8�c�\"�f���b�	.�d��d��pI}�p����\nVp�s����2���뙺p8)\r�X<�����%�`�d�f�2aJ�]��Bɝ[:����?gv�SY�2�s�qa%K�H\";�<���s�F?���S\$�j�ߔ�X�M�S��05VXk#ą.��!�,5.��Q�i_��F\r)T���G9��T��e7b���5��C]���+ޒ� 4���\"���ߏ�:��4PH�!���>��\$�}0�'A\"�Tas�g��z�.�;�2��BΞNË%��\0��6�`Lxg���]0\n��crHUQ~LW8��J��1@��s��bCIw����o����K�{��O/�/��;0^bF2�'@�!LO��:�b?\",Fp���}�L���5��I(�I��4;� ��%�#�#�\r�j�b.��t/��F��#�	v%b�	��3�2�\"�*h���&%��T�~��,�\0�+�)J,�Z�c�2'�@�	\0t	��@�\n`";
            break;
        case"pl":
            $g = "C=D�)��eb��)��e7�BQp�� 9���s�����\r&����yb�����ob�\$Gs(�M0��g�i��n0�!�Sa�`�b!�29)�V%9���	�Y 4���I���2��FSЀ�m4ǁD(�X�a��&�\0Q)�����G�<�z���)��c=�\$C\r�@ib1���uN�������i��@�9�߄:� ����z0���(����EY���F;��D����k�PL��9�Z���]���w�NE��Ղ��y��1r�e=I��t:�D�h�!!xS�3�<��������;p�;�C�,7�C\"��(P\"��󨉌���:!,:16,�CĦf;�C���P�:��XƂB\n82��n��c��؁C;^���b��\np��'�`����ͭ�\"%#�Σ�/�,��R\0<��t�C�i�z�,T����+�5����\n#��\r��2���&Cx�;�K��\n���+f=.�K�1�ԣ�S�s��tj�9�)�)�,m.�=Nkv8#�\n��#�z��nU	#l\\9KB*ua�B��6:PثR�k�Y��,�#aM\rՕh=G�e����cR�����4�@!�b��P��T1:��9�#�3Bh�66�]<%���fK��ԅ��A6���rx0Ǫ���\0�1`���o ;���(&͸�5(0d{��!b��n��L�f3t�U�wP�U	�As�'\0䅲c��C�(�H��%�(#D3��:��t���#\"��At 3���< �s�7��xE>C8�:l��ńF�}`��7��^0���5C]xs��4�(`䞱\\�l�'!\0�7�C��:�\0Q�]�,R��v�pR�p�0i�d4�͍�1���S��	j1��vիny�B���\"�=#z��R�:�}{�%i�u����D�T��.A\0��.���T:�gL=vBм%j�N/�Vݓ\"G�L���``h�:�\"����,��4�t(�I�#�05�\0\0PY\r�1���C{q��u\n��(J@�;'��C��a\$��C3�\r�`c\nM�q 1\$��ث��\r90����y) E}3�Ƌ�R�f�E�K*xz�Y�GS6A�\n�\rጂ����Yo>d+��h惘:�������i�H�3B�\$��\n	�M�2b� rW�u�E���0TO�H݇5t!Ymu�=��l��P��B\"�!*��,ҾCt�@N�d\$�����53��њq���p�j�q�O �\$�9�8C��;dt�\$�&�[K�~����9�8���s�Y,&	���Ck'�%�r [�pD5�Ė0��&�PN��K2�ΣO�����S-e��?��Χ�,��aT6Ҁ��dLfyO)cAN�{�2�Y��T��\$�?)n�� �0K,�3�*t��|�*b�_�U��^��j�f��,c�ad`�)0UGF�e���h����9n�՘�GD��	7�\0�S ���*e�AA�ʈ��FB(�ȵ��eu��@X�@��P�����0Y�gV�y��2�p	����Zh��\n%��Z�mz6��̫lPդ�D>�Z��k��Eq`4�7¿�\n�*lV�[P�vm�;P6ь���iX�޼i�����5ܽ6~��{[{N҂@�8�L�\"S��/J��V������R@I�e�~l���x�����:QI^E���X-2*��I��S�����pӻ�\n�BA�B�e�,RP�I�	�/�~C�M�,Ѡ�'�-���y%�d�\0JY����4�y8M���sq�+���D��6�	�`�щj�����p�d9�@��#j�f}RU�\n��W�uF��h3!���@|be��G%�0(�2F��r�ni��Y�̘�f����M0����ʋB��e�֖{A3�����[�򴰅\n	��fĕ|Ήճ3���oӀ�P	ޯɤ\n�j�\0Mi|�1�]1�Zi9�(��y5���#�Sq�S��N������+\r綵F�#��՜���7��j���o�rn���7[�h�w�2��6ʇ�\\���̪����m�n޾�U��!+�\"���}W�x+�(g�q�c�9'���T�����3�I�p��L��uK�p+Y���!����µ���c�����k�g��2q�ZlPX3��a�0�t���<%ft�3�\\C�hn1�h��~����h-)�@�M^�6�p����g	l�\r�Y�zɈ�{V����)�=���x��x�Y���ˈ�]VT���}{�������S'�<Me�5�v�Λ�{��^�Kы[ԕ��ݸ>�|P���m�ƫ���S�p�i�=R��:���X���Æ!j�r�CIhcBn~�f���&_��epb��p�\nnf���<�.~��@�*�n^��l�+���/������a2�E,�N`>#��ťDk����Q��V9��*�O*�,�x����pv��E��\"����������\$	J���\n0x���6	0�x�W�Y�;̧��V­�'	�W���� 9�l:\0�2g<bM���BVej�#V��F����lTN��#��@!\n��zvf%o�\r`��qK�(Q&� ���Ck e�l?=\0��Kꕅ�N�.v����뢸ke1\\�.�cR\r�V��F#�\$�i�gB����Σ0`A&��\r(��&B,m�\0�\n���pΉ�5�@�l�����qi,�\r�h�X�&�1�w���ċ%��8Ǧ~�F#�4[�8wm|Q�Cl«�q\rd\$Dj\$���v\$�l�2O1ܞ�b5+nQ)\0�>#L|�b[\$�;�g�6H�A��Z@�Ȣ\r��կ�̢\r��bb�-�'�\0�Zo�(Ox M�'��Bm)\r�o|����rr�͹'�:J,��bU��(C �X@\n�_�<�\$P�f 2j��4�d|9���->�qV5�\0jh�/B�a-��	���t?\0�U�3g�(.�Edr(DHD,��˓\$6ƌ]�t�挔R{'�O��!+�46E���9�4�B�r�Cc�t�ؿ�:	簊c\$:���.�";
            break;
        case"pt":
            $g = "E9�j��g:����P�\\33AAD��� a�Dy���V������v4�NB���u4����QP�m0��sl�i6�̒Ӕ�c���2ЃE�L��\\�?��f�c	��o�F�9��a6D�Z���m&)��4�&J��U9ʭK�i�s7)(�vr0��f\$�\"L4�n���c�̦�)�Ǒ&�Ζ!T@B�u�#&R:\n)�3���u���cFGa��v؂)�M�)�+����#�6Lu�<�kC�j`9	Y��u:Bu���c�%�V�����ޏTLީ\nH;2�,(��=�4�σz��\0�<��L!	B�3��c{�ê�S�e�4 ��I1�1�M�^�%�0@6\r��'�L�>ʌc��1��p�\r�L��'	҄�-��V1R��bH�N�\n�\r̓H��a\0�(��R��Lخ</d�%n;h�9o���#�j�m;�?�{\"�O��;9.�o&#H،����6��������6�#Kz'?�T���CcF�2���cL���ZLb��#0쁍�J�jP��2�6�)R��Ԭ+��T�.\r�6���2�K���%%2��Au ��J�&��܋-��Et���X3)���HH(�En*D���f�Gä��Jץ}`Zɠ��-�X�c������2X��4HC0z\r��8Ax^;�s)\$��0\\��zM�JI0�����(镋��r5�A�.8;6���|�aJ��-^�0���荰�l��\"��Ё��pݡ�ț�:�V���H�X\n@��S�N�)aJJ����\rɊF�\n8�k5��B��-s�L#�@�\$���m�H�(_w�X0�+d�����)��Sʧl���ؐ�:�TR.�I��X:�}��u�����\\�<�!�\"���P�7�\0@:�{)�\\�<�4t�c�0��̕�AMlߊ�M�:3���(���\n�[�\rv��LH�fp�đ���|TdO*���W�O�#�7�l��/<��ۅe�@��D\0�0�1^�,5��s��k�ո�\"��\\KH�3���i|=�A�����M�C\r�0��j\\˩�@%�*2�U�o\n��rh�W��~%����7�ы;�('��@B�D!P\"���(L��S�#�\"2*�G�J��4�(���9�i`	��+\"���	oH�\\ ��H@�tO�報G(RL�gl�\$S�XA��h�9��jc*�;e�d#b�C�`�g��Cs2��X���.& �\$�P������	Y ���#��[�I�,�=�D�_��W�,��C)�\n��3���b&�>&��P`I9H�ܳ�f)�:\$�ڢ�b�.G2�J��H�q�1P�\0p	��aȅ5ۚY.D5��`���V\"-S�d������|�z|�XfiF�\0��o�9l�K�T^��a�P��7bt�\$�cxd]��\n���4B����I*Mp]5��U6�V�i��ɮ�zނM�]����;\"h���]e@����\\���%�EЙS�W=Kv����I����璸Y_�-4�G��`�n�T��I2�kpJøeMr�ղVS�12A!�1fX�H��̾6r�ZP\r_��B]�0vci<����^`R��s0Φ�ޢ�o_П�@��2PvZK]lO�ږ���GK�P��t�͂a����[��:f4�[eD��\"Tcq4ޓi�R\r�\$�V�x�N\$�rHxKIZ���Q<`%PPMY���ja!��hy*aҕ\rcI��\$\"��\$#8�\\r('��VP�'�y�DI�C�'\$�����ʁ�	@�3�\nBa&��R	)�Ћ5:���05��#�N\"���!ףkSj��5Ma�mN�e[��v5�*���!w���\"�,�w3n#�l�l����/�z�SS|]��\r��rJ!�\"�;�q���-'�\n��)�e���euam���uO�d�X\n��˪�&cH�O����c������A�7�6��f�&ۤy���`�Lí3|��c5���\nИ������&y�*�BhgJ���,\"���x�Ź��t�x���VU�r@�Q@2K�*x��͒����R'PՊ���>�q�4��ԓ��ǐs�DQ{�c�{IiO\"��ǥ����M#�ܗ+�ÒW2i�U�8�P:���;��k�w�]�|漣��5w�>���B�'�'Q�����&M<1Y�*��:3	�4]�U���U��D�z���6�;�a[���OQ4p�о�5eȴ���Tj�ZS�{��\\o4���5��O�eQ�&E����#��pM2�6K0��#dY��T��YP��pg�ZEX?��jv�0����Խ\nI#�H�d8�Eĩ��@(�ȃ\n��-|���\rn��6���VC%Gj b�ߡ�Ed(�	��/�҉g�(&��\"��0L�^j���V]C���j>�\"�k�]I�&�N7b��Lk��.�n�����/\n�MD�ó	\rI	M�\r��aĒ�fH�eP�⋆��41\0����(��}d��)@�l�Ф���ک�6EB.3\0�HK��Cn\"Λ#	���Ɲ�l:DDA���'�9�94���� �\$�i'�2 �1�Ą�V���R";
            break;
        case"ro":
            $g = "Ed&N����e1�Nc�P�\\33`�q�@a6�N�H؁��7؈3��� 3`&�)��l��bRӴ�\\\n#J�2�t��a<c&!� ��2|܃��er��,e��Β9���l�F�9��a�0�����z��&FC	�eV�M�A��b2��q`(�B��8#9�(u6��@�%�O+�Ў�S!0i��.B	1��c�A�Ы�(�i8[l���o6�N�<qOXe���sIn?s��F�&�M��b6��(�o����M��#���I��[?7o~Pe��:j�%�:��`Q4�2\r)JD� �0�==K�T�@F���8�\rØ��4#p�:�(��#p�\0�>\$2{�:!,Q.�A64�L\nO\0��q��#:�BF���\nƽ.N�1˔,����ɰ�0��/K+r����86�{�Ltv6&���\"I0��\n\"`@8��h�JC�4ɣ�Кį��\0�0��9\r�CA�L\r�!��,S8Ҭ�L)�Ե ��֊j�G�P�6�{�\"2��'r-3��s��`RܸQ�;9��}\n67`P�)�B2�7�oP@�\r��19ap@)7K���~�G�\0ʕ��,9�#�9����9i�v2�S*d9��Kʱ\r�J웵��^���*���@���\0��\"Pz�\r�*=T�5�:��s84nS��,H��و+I��u�o�n&�9��磘�E�@2���x��8��C@�:�^���\\�(�H�,C8^�ls�m\r�p^B�:j��0��XDU�ܯa�^0��P�7#����| �j����9=NJ��V�\n��}�ʌ#�ҿ�p~\n��j���_�b9/Ϩ@)aO'O'�R���h�+���X����+��^�x5,C\rҥ�w��5ab��)���7\$��o\n�\ru�|R���M��H�h�|��M���Ҕ��ߝ��\njI5 �@�6i� uLt�sd�\0SN��|�<I�0T\n\\7\"���i(b�ed\"j�β�T����`�Z\\�(!b��.E�)ZԬ��c	��;/��)����A�!�8��9Z\$�/3t��s�ޥ\0�k\r>8#HUܺ�\$�@\$A��b�If7e�FX�Z��w�Z#�\0�u�iI!Q�#:&\rI�sK����@���7jT4���i�Oٙ�ΦL3�P�	\$��.@�i�5A��I��on���#f���	/L���%�ܗ�pAL�VMDhxKc/9������,���`��G�p�b�u1E�:�t��'J)��&g�\$\0��3=\"Lr�@� ��9\n���\rǀ�\$>�B�,��ޟ�\0�߲�A��Mɼ}��l��9��*�\rcE�3ʩ��{�r'�!�V�̫4lᣓ��]N�^A�KC�vJ�> �6B�ZI�o����Uv��Q�.�@\"�s�#�bxOH��I	��QC��Ō��˖D�����&C��j\$���W��b]Ր�U�ZjR\$��Ȳ��f�nd\n4�V2�M�5R��\$@]V�_ ���Z�\r�qyk�z\0�(iTQR'd�	��IO!Q'D�+���K�-d���\r1��3]U8�:�}�\$�܀�i+	�3����7jR�L%����6j�(I+E�Ϭ��Hђ���>��ޖТC5��мHu1ͥ��Ů���L�q|wHi�C+�K-��7B��(Koɹ݄���p��K�o ��|��s�PpX��?�r�`�����O)�0��f��ړ��bA�'��L�;�I���21Õ��hK��^�\r�5���T/\$�GW��Vb�4U�=�d\r[G��kN�_RV�xƲ3:&ЌK�]l+Ç6ֺ�`��&�K�i�d�>��2K�|L����<7��E�G]bD�7�H9r���A�})���NS,�F�]/���u�x!ge%G�\rhA<�	B�P_,���4ɤ]�Yk��C�[�H΀N��:����)����0��s�ےRQ��٤!���vL�헱�e�Y�rLQM͑�~J��[B�A��;A�m��(� �r��`��W��_�<��Zq-,�Q��0^����2�Y�0[�#�2�{�v�Y\nIаo�Yچ��i'�t<ȃ�D�I�.��:�� y�4w��0˞�kS����ԑM ^k��u@=Z��݋�,�R�H'�n~u�ɿZꉏ�<`ȑ��h8�Z���he�����[�HC)�KaL;1D�a8%�����ꮻPF�T�Zhi�-6D�N����_�0���!��d2�jH�jr�ί�Q[C^�Ι=1!G����x\r~zb����\"ƍ(���s��G%W]Λgu|��7��g|�^����8�&�wT��eu-���M�	˩I_�m�W��O��C�� ��[�\0�<����Rd�1M�%/�������-�/�!Hmmx�Ŝc��P�(Zb�&\\5�\0�P�ϘA�̫J�0pد4���ډ\"Y�v\r�Vc�`ֹ,\$��4#�;�,\$�%��&�rN\0��t0	�\0�\n���p]BBP�~�PGt��`I���\$Ɛ�u��sB0#B8/��=����\0-��F�`Ē\\	:Fdh�0z`hl%-Я��'�#b�ae�9�L�AW�FAv&�,��B^ c�	�e �<(ΣBT�9���2.�8�c�M�]þde�Xްp��k�Ρ'>5�v�n�t���&���B��Q49��^�B81j����|���i��P䐬t����'Z�nY�� qʈl��f\$|\"Ø0&B��H�el�ўA\n��+��Ch��|FC�	�B>��-\\�K�;C[!I���\$P�HB0��2aBa�	\0�@�	�t\n`�";
            break;
        case"ru":
            $g = "�I4Qb�\r��h-Z(KA{���ᙘ@s4��\$h�X4m�E�FyAg�����\nQBKW2)R�A@�apz\0]NKWRi�Ay-]�!�&��	���p�D6}E�j��e>��N�S�h�Js!Q�\n*T�]\$��gr5��9&��Q4):\n1� �K�I�Iзh�IJ�6H�B?!���([�&	����sD5AW�ꋬ�QcCXMe�<Ι#_FR�	��g*YV��|eC��/���9���Pz���4C��5n*�I�zVn�����<�k�Ѡ���,��-�;��F&N�ܰŪD�#\$���db2H���<��\$[F�.��ʌ��P�A	C\0������K3j����u	s��+.\"l��I����|�&K2�Gp�ZDIj��I��Zȋ*�\$&�+R���*2���\$P�\$.�\"ݠ\n���Q�2P!���sK	�#4�&�L�=�R��=��@�}\n�MƁH���Y���� �9E��I��|l�h�d�*\$u\n��S��J��H�0ɤ!Ѱ\n;E�0<����6����r:�Nlq`��P��! P�:��`@:#�2���7B��&%S#�:���J�)dE�JbJB����Ҍ�����\n�NP�6h_\nt�aK,�^K���Z?�'�sG���3d���Ł��|���\r;\")�\r`�9MV.���3��0\$sN��M�\r��S&c�-D�Q���:R����+�d@o�!�b������\\�D,3�(�����fA�HQh�+�� (�J�G\0>�j�5qT��d��!I:��h>�5w��#�R�/��p󫧡ٲn���<J���|!t'��\"�)�H�C�+��I�j\n�#pV�')��dZ�O6Mz�Y;j�g�.o��!��h�9��(���;���2���9�&�!\0����D4����x����CHn{@���p^Ctd70��H\"Z�9p��_[K|5� |Chp[a�@x�>-��B@�zz���ַHt{�h6��J�\n�nF\0��&e�s�B�����*:FT�)�}�<E9I�an�\"�,�@���t�� (-ह8�yK�8�]����H�J%�|n\\һ3�QǞԎ1���GZ�k�@Q����Q2	�nK��S��D�t�b�m�S@'�0�X�G��I�a�WMZ,UEzQ��Lt�D��,�<�LHB\n�\"L�Ӱ�i�&Š�bNO1/HH�NMh�X��FAI2�)6��o��o�@ao���� ���\\��4��@�K��P(O@ܞ�L!|0��\0��xm\"�h;@4ZךbP�0�\\���c�zY�t�ti�\$��d�&EfDɚ��drR:��j�RCDѕrf^N}s����1AQ(��E�e�i�j�G�%Z\$�+�yżB��*�@P�2,������-��Ypq�v���h	�OM��o!���\"��ʖQD�p��D�.Y�#2V�ט�MW)-�N���D�W*�*r�DG9��r�䠨v-X&��Cuo��D�(	Ѳ%#�Ñʺ��)�ڂ7nZ\"Sz+�i�\nSE��o�T�5DSUj�9*\":�G4S\$�J0�օ�4�Ƴա�7��LJ|�<,y^�4�3�5�\$F�\\��kn��:1�����\$ _Ô�ӥ-!�[عc.W����y&�]w�m�T�\"�^�t���?���3b�\"E����bB��I����c�)�jJ��{a�ƯÕ�m�AJk7gD=���iM|csmf_f�%�s�S*�%��~�NXI8#\"�d�fV�cA�j�*�Z){jGDdR�[l�3rJ��#\nM��1�\"�NsuJ�%p�y�c�B��Dt�m�yh���CU:8v�r���H�zG�A(;g4���ڌ�W@��9K'Ԣ�\nj���(E�d�@.7��kf~���!��/c�|��ӖL��-��*6�Ә\rwl�{�1R�_Q_ik�A\$�q�����F�TQA�,/']��v.�9	��2\"�GJaس�ao����6�ɱ+�t�Px��|_o�����߻��p����!r��awbY��U'��F=���i/��M\rr^��)厔��͎��������4��G�͝L3�J���]/L�qB��q�Yj8����\$���3n]�Fc8~	K<ߕ�dc�I�Dy���������3#�*+G�x�%~���g_���X2AȬ��-�O0p�+i�*�9	N��\r�\0�hۂв����Z�4�Ų������:�?w�C��.>�3d�R���7ޯKk����C��dV�ng����B�I�/����}�*��jF���}�.�б����4O����ȏ��v��d�K�go�K����G,J��Z@*��r��\0%��E��ɔ���Z�\"`�F�E����J��y�\\��l<�,B/�PB劏�Riˀ����*8hm��(-e���B���Ƅ�*JW�o��XD��Bd+	eP�����=	0�	���P��-���r���jy	�QP,��h/����0��E^τ��b@u��#\0_������P��p��c���\$��0\"�*�#\"�\n/'P�B���J�N1)�z��Μ6��N�N&C���Kl������b�����joI|�Qrs1vy�t�a{��s�b�#�H�q��r0L�&l�LZ.�p�0���4mpTc���\"��r0F��?:�Q���ń��������eE�5�\$q�n�NHK�����1i������D��srb/���D�,zM~x���R&�,&I���˅q9.8��%�Q%莉Q^���nIo.��3&KΩP�o�\rQ��)'L0�o�y���*E�\0r���p�*eb3�{j=&�wP�rĺ\r�D�-��Jpt��~8!�1j��%��I�ܢ蘒-�ێ\$��HU%'%��1C'�#\n�%s 7v8�iOA��s#3e�)�2�-O��\"\r%E8����m!432�ަ���E\$7�{)p�)�h�(a���#�FC\$(�,P�B�,�!q��+s�)��(���e:��ʬ�:P���O;�S6Dx��<!6��ʓ�.��6�&x�CR�U�B*M&V�@s�+0H�?�uq�ҽ�\n�DA�4ѨΌ��q1�/1�24	)\nQ���bQ��e�0ͽm;C����N8\n�-�/\r�ʐ��*��SF���tYG	)e�d�� Q����ׯEKF39\$S</��F�u:����qt�G���K1Z\"�f�\r�W\"��:���\"���^�u�0���m���_b���[����\0ć	�\n���Z\0@�\0Ɔ(��?�R�/�N�xO�Xk���u8��IUAM-D��HڵM u=D�fh��U��F�x�z��_�zHFM���H�\0�6g�b���S�(�.� 1Nq�b�����N㈐+v�c�u��0DLgL���AW;�F��g:��*2��A���@�S _i�\r��[�`[D��x�r0���u�\0�6�U���Sa��6#\n(V(,U\0��!M�Uj49b����6q�{'�R@���ʅ�@�U�\0@\r���\r �}':bh�e��8R�^�<.�2Gn��.8��.��*��U0č@Qak0Y��a�!X�'��gLQ�s��R��K�eC�M\n�1��X6�s��F���^�^�8�u�1�\0���J�F\0G����_��d\n��Q�b�VJQ��%A��\rɾ�S�akP7�NA�)!9u�� ";
            break;
        case"sk":
            $g = "N0��FP�%���(��]��(a�@n2�\r�C	��l7��&�����������P�\r�h���l2������5��rxdB\$r:�\rFQ\0��B���18���-9���I��0=#\0����i�LALU��b�&#���y��D�	��k�&),��F0է3a�D�V���a����{��\n-@�f��(�h��ds)��e:G��3�e��6Ì�)��P7�X��Q��t�/�D�.0ߏ����x�l��4C�8��0�\"\n�ٜ�s�#�+�D2dq�%���1T;���)\r^7>� �4'�|������P�7���4�8c[�()�*����� @1 ����@�:1\\[���i1Jè�5�oP ���3�6<���CX�2�)�z�4-��2D�҄���\r#�bP�,��j �tx:��`A'`�0��p�&<��[\rK �#�4�7�q �����B.\0�H;��ۍ��C���6�B\"�5N\"ԓ�P��P��&�11�HڍS0�<W0�2<���S�D\n7B���#UN�;F�t�660�2Ǝ��{;��Zrb��#�F&3*�3\"t�P��Ր�%5�9�*b�2�C+����3d2\rc���Cx�@��t�Ӯ�,1*\"j��-�9�}��?O�P/5欩���1L��\n)H�m��R����\"⸕3B(83���ʸ�4��%�\"� �3��:��t���-�j�݅Ș��;dڜ�!xEe�C;a����A�l8'��|��a^:\r���7A2����>'#�R�-ˀ@9 O�#@���)J`�/��n���0P0�\\f��5��%G���\0P�)H���_@�c��.����<��`�&��t4@��[t�P�z�9x��	K��\r��B�9#_^(	☨>/�jQ�������2���;G��\nc�,A��:�0u\$�05?����Z�����u����DNY�\0SO��'�FE�0T\nP7\"b\\�\\��΀ɯ�x��sV�Y*���Uc5:\nMV=B\$�A+%|P�6<������Q*~��ZpЯ`�d��o3���V\"NX�.A�����[�@:q�2�P�!��N�V�GPS���eo4��\"xb^��:d�S�B\n�0�Uɂ0�p��6]�HC��;���Oȃ�N�K�I2g�xNT(@�*��A\"���0�`B�0:&����J��m ���J��7L餠!��O��C�����3�0#^��7+A\nY��\\�ML�\r\$p�Axd\$�9��G��s����:�؄W\\YGg&��6���r���1��̔�������AH�#�\r@(!��~��\$��1ʰ�b�t�FZl��݃��:��'z}P\r�s�n�Ȣ��\nWj�u�Ҳ�Q��22&5S�.�\n\n�p���cϔ]X�h��3�q�I�a���f\n�ːz3�Ϲ���o.�S����q�ق��:�YDOv�FW�n�\r./�A����E�,�����d��<vX�2�f�=�_�*аkiI�!R����Me�0mB�l��U�lK�\"'��Kw�hna3[���@��f�<PZ�u>:��^?,�����.��K�ٛ2J�J)S@\$\0�+B�=�w����8��HZh���XA]	�\r��;�@Ҋ09��D��JQ��N�A݀!C\\C\rٽ��L8Z�w0��	��3d���,��TFQ��6�۔ԉɽv.\\���Տ��@1�4��z����bn᨟]���F*\"H<RCB\")�!��2pݜL�u�H���X���e%!W.���~	��b5�c�@D\n*j�gxL�4���V�\"�(��CY(�E#c(r�)�%ً�Q�ޛ�9^���3Z�	�A�I���u\\�DC.�<x�S}��2 �\\�e\r��WM&\nF�\r9dny�Z>U�q7���+\n�4�ܜ5*�f���G���h���Yҕ>PE]N\"�I�k���`Jw�L�Z�jjl��\"F���SS�]R�7�zB8	��Wj�%�d���\"�8%ӵ�b3ٮg����|S �l���:�w���9��qrA��k��f����mN%yħb7%n�/���������d����R��S�-�w�y����ԲOg���Lɜg�V&�\\�Ibf��Y+}PL�7c�ͳvm�����`�5rѽ��&*𘍨M�x��r�,X|e�IG>�3��YK�ނ�H�&G��~��v� �[�9ORǴWקm-\"����Ӭ���4_@�ұVB�Q5'������~5'Q�6��=�H��Ƹ�J��P���@�{꣼�N:ឬ8�QЖI������טN�	��3r�B�o��\r@�&�,���ߏ|�M��d\n�|N.��_\0��S���\$G�H���A�V\"JM��N�;�̨�\0/r�J�7n��/t��[�\$�H�P A�f7��r7�3���8�8�4���ݰbǰ���\n.��0o	��	��z��n�L�?O\0�^����v��\":c� @?��ꜯ�ҍk��P����K�c��Ks��+{PF9�z	b@^䠯�<\r��7 �IL�=@��BBB�\0%d� Е#b\r�V\rg�\rd|�f{�2e�\"g^SC<|��>�R�>)�*z��)v\n���p��#b��N�n\"pP�˨�2+���W/�Z�������¸K؛	8Y�**�4#�<��FZ��\$H\n��F�D���9^\$)䁇�#P����Z��|�OpCIf(Bp,I�@�\r���1#DL�Q�U@��|C����M'��,-@�Q�%m<_�\r��\0rT�(����G	,����1&L�\rN��pq,�'�N*�'�fl��jBT�p;�bz����J0Oh��\"��F.Ē\r	��@�~/��#����-o<��|gF�9��@���J\"f�l�0�_*,�0\$v\nd:6+r8��F�%�(H�j��\$&΂�Ɖ��c��|�~^d�\nɘO�(��-	\0�	\0t	��@�\n`";
            break;
        case"sl":
            $g = "S:D��ib#L&�H�%���(�6�����l7�WƓ��@d0�\r�Y�]0���XI�� ��\r&�y��'��̲��%9���J�nn��S鉆_0����Th�g4Ǎ�i1��b2�%�\0Q(�z����՜�\nb� 'cI��\n����a���7\0QN�6��V	�\n#�M��)��	˔�3�)��2ȡ�����g�1T3��9�2��\0�f�P9f�ȡ�Tך��>�I=Z803|��-\r��Lz3�̆*�N	�2�:�sa�ɍ��=VkF�o;s=�à+��������(x�I����<5,�d\r0�?�2� P�:��X��8���9����6HJ�5�Òx�1��J�C�\rCz�	��H���x��9ib����ܣCè�6�ڊhZ��A\0�(���ȃ�C��״/�ғA#��5=S3J�\n���ʤӒ2ƍ\r*o6��\0¾n0�;\r�c�D��x���44�<#���*��J�6��[�����,2�.�*�u8�)�B0\\;M��5\$�̍\r��*6H�5��^�8Tn:�c�RP����&��n9ɨ��\$�367������l���΢X�U�z�\r�c����ۊ�X�����-�9��B��k��H9���2���U��o3��0z\r��8Ax^;�tvȪ�\\��{ӕ�9�#x��T��3����1/�D	#h���C�x�!�@�����h¢\$�86�oM�� ����)��*U>��Lc�J4\$����`\$\n\0P�(�L����|&)�j�6K��K��ꌆm��f�\\�=��=;�`9]h�ܺpHT ��v\n��t�Ѱ���'�b�^-k{ep��:���#�78�s�\n;����⛩	x�7���7��7�}�3��\0@3/��¦���\\��70�Z��g�Tw��?��{z= C�/i×(T	y�S�]7%&tׂ�M��ǆ8Az�M���Ҭ�Hv;\0��\0���6ia�B3�m�Z\$�(7HFvNj�q�@�HJR\0POd��\0���|8�QL��|�Ñ�1D�9��K uV��5�0ꋀQш)<�s���C<I��:����s������T�Y?�q���k�8i#\$��I�+q8��㪓W��G��.C2��=�����f�ѕ���ᛩ&Q�9�#mL�-���k=M|���|���=����C�_�FYA����Pف��Ǩ���ֵ҈������z�E��5EH�Bf�/����\"bE ��\r���v���:D3%F!�����R,ř+�RvI�*�n�ë?'ú@P�=\"��Y	���puZ\0�&D䲅��B�6��UF\"m�D� ��VB�6KʒB�L�qk���z3G��	;T��-B�@�J˥��\0R��L�Y,�.�R�Au:\r��i�\n��j������T����U*�I�*Y�j�긜Xim���T�ƾ(*\\u\$ޞ7�\rZ��>\\��7r�S(�m<t�:�.U���Ě�JyT\0M��\$Rǐ+\$B����v(�U5J��?����Ve�#�\$x��XW(Y~�1rڔ �j��s[����Y�!Rxt6X���HȤ��mL�%�^jd;H�4�������P}������ϩ'Z����\\I���BTO��c8��ڥ=H[����ȓӪT����.P�U�	A[w��CB� R\$������QzGX�@�h��<%��Xb�I�)%Zj���Ac����`�Yf�G�KX�M;��[��WO�3��,��ÖR��]JE5�,E���7O�^��::����HL����+�`��\$�w	2�`'�\\\\P�F�>Lyq��v������߾H��_.�o�Q�6�VF.#�`>Z��(��q��l+%p�ER#K�K'O>�D�]	�oYA��h�]*m�:���j_b��(z��'�]h�Qؚ�r�m���]G�Ǧ�X���\0N���Wdk���6�QMuΚ�؞q�֌�&�i7�7�U�b6�jX�����Q_~R�Bz`\rD#X��Lݝ.�(ci�_M�Sk�˨^%�=*�T�16��d��I��NZ#Vn2�K�F�)R*���rBb��(fC���;��?8���*fr�o����>S�Nk���gĳ@�_,bF��'���|��xF[�'��G��P��JҼ�H{�6iK��Pu�K��\$����P�;�n���Ik�/0}ԟ�����Czg���\\�ӥ;	�򽣸m���?u�ߥT�̈�M��y��AߨDh��)MͶ\rfw6�ǩ�8�]���!v�+6�;߽Wߒ?������=���9;�Ӧ?\\��Ab;l�5��S��7��Z#�y������D��K�O\nhՓ��G��Q����2/��z\r�9�\"7-���Zm���0�M��^���\$�	/\0�^ݐ3cr?^�Fd�)�\noGI�A�\n0�R��T��?���L\\\n�y\$�js\r���B�k1\n�h�pH�<\r�V��~o��'�z,p�B^Ǻi��A0��\n���p�c�, θ��pf�*p����d�-�Dp�-�\r����P������Z�66��X\"��@��h@���fj\0�#^���r:�f�nL�,16�0����3Ĵ� �I��	��@ ��Ǫ�:��P������J��\"��&'f���P0>)H��>��'�MW����b�=�B�\"g��J2'���O���Ў���E���#� B��,�\r�fL&-'J'��lQ�'By���~����\rr-���\"�1pP�1�HB�G�}�+�1��\rGf���k	T\$��D��[�ՉG\$o\r\"b.C,.2Jk\"80�挰���";
            break;
        case"sr":
            $g = "�J4�?4P-Ak	@��6�\r��h/`��P�\\33`���h���E����C��\\f�LJⰦ��e_���D�eh��RƂ�hQ�	��jQ����*�1a1�CV�9��%9��P	u6cc�U�P��/�A�k�\n�6_I&��N�~]�3%�&�h,k+\n�H��D�RIVow�⯳Ē_AEZ�\$\"�}��!�E�u\n�I)K�ŋ���#X�NeN�-a����a\$�o4�\"1G� 3��\$�5�����^͡J�T0����!P�ϩ��E���O�/9\n?=�Q/��r���Ӝ�?���Ⱥ�:��b��#��,��m7��T۵(�\0���a�˪�Y��i��j����]Ć���?��h�>�S_��I!9)����#%!�L�'(���&���_H��k�ƁH�=����Ϋ ېp*���P���9h�!?̓\n� �b[9��I(���BD�v�ND�%L�L�CoZ���m�\$h����i3n�,n����ʟ �R����m�B��& �Sd�#O���N`�+�;T���I5�z����lP��t�Me�HK0��%%�7��qm&E�rT\\�\\�����\$��-5��*U��Q�L�MG�C�hЋ�.&̂�;+\rs�אu���6s�h�km��0�\\ma\r��䡦O�\r�M�@!�b��\\�E�\\�B�[f-�|�\$%���q2\"�9L���o��NPO���ZH�,ݦ-u�3b	���R#P�]����T���K�NX�|�(��Ĉ&���-j\"Ǒd�Jj��7�Z�	��:��@8pØ�7�Rh�<H�2��xx0�G.3��:��t��T# �4��H]��x�7v��7cH��A\0�0�C8�:t\"��6#p��H�8\r�(�ێ��^0���z��7ɣ���#X�\r#�č�o���kb���M	��FH!�f�о��xM�( \n (��ˉT͝�!��O��kf&Ĕ-�\0^K��S-l�w�q�\\o࿬��`C)����S�1�5����J�DD�`��RhB�O\naR�bg\ra��nkM�+�Pܛ�-����C�lv�?.���z�\np�,�´�N�֒�f�-#����B!�:�\0��A\0uz��ւ8�Hg\n�\\`��A\0v\r.p#H�RhiznA�>�@��o\r��ćgd��@� ��F\$��t[ OпrS_�74�b~��k�u�&j�尃dG�\$��\$�bKA-8 �K��Mm���֔�1i���c�(Q��\"���2	��?`�<3cdL�Ёp6.�2B[9hBͼ�!�\"]�M��	�Ȉ�N�͊�!T'#j�ײB��u\"���BV�ЖtD԰�P�D�;+m�ВZ\$J�*�N ('��@B�D!P\"�\0Q*Ȕ9,�\"\0��e��*\0��S`�B`E���'�4��a����T��{�h\$��J�LV��/�%:��jaE�M�U��F_� \$�@���[UU8��&��2�2O-,�S�2�54�L�#3��&��E����s&yWE�y@U��h`r�_Р\$�,�Y�/?��ɝ�qT��p���w�T����!,�)���YV�0�i�f�&E&ޔ�a]�!�BEn�Ť\0n�ֺ��Sۢ���pB�}��>I���\n\n�aӕ�OE����g���S�.�PS\\x���j9R\r���i�'��%4b���b2���0���u�V�`\"�j�U��e���m�&\nR�����\"�'��%�C�����؈\\�B��Yg��7X��|Њn)�Px^�\\2��f�(��cC-(�C���l��#p��8�ah/���;�؜���W�p�w�!hg�M���A�\r��l�L~yǥ#,=��9� ������m��.g����x��<�tT�0\\KX�%���sUY\"�7���Vy�R'��SSt;%ce��O���{�w�!c����+IQ��]?��pG*(���nhmܱ��\$���B�(��\n1��wv!V-{�9oBk��bqѴ�~�-��x�*�C��h2����i�OU�N�� C�d.!���ǃ���,dڲ,!&X�����6U��Ҋ���˨��C�����3o���/�l���gF4�T�=2mp>����ޥ����(m-�Y�T!��#�H�x+4q2�����j�!{>A2�ױ^�Ԋo}�j�.����S����٨��zm�\">��\0�p#�Z�y=<�?qLmX�-T����U�rrOvn����-��'V1u�������2�Z�{)k,=���ݑe�h�Ƈ��R�\\����<�^-wľ�ʕ|�����ן�+���b��c��ؿ�\\����6���~6·�1����3o��Ln���/p��`���,<�L�̭N�jڀ��jT�Ζ�h2��������� ���k���۩Sbָ��Df�\"��ET����ʚ��j&�ܢ&V*� F�R#ye��p*�pNĨ�\\�/ kp6]P���^R��2b		e.؈#\r�V-�(�\"Bl�j]�\$W0(��H���.趡�I\r�^K.�PlG,\0E�4�,*�Ư�m�3�΃Ka0R�X�)�E00�0¾����i}2-k�%9Q12�qJ�T&�Lg����ae\n�.��(YQj��~)�3��:�D��H�E��,�\$��q|S.�����\r��q�\0�����(`����肑Z�ά���FaL�<MsŘ�)��v��[�\\(�sCn�%��#�\\N��Q�E��ɠ�N�\0��`»q����QM�Q!�+\"YQ^�qμ6��Q�條\$e�\$�YoP-�����3R\"�&�p�H��\"�-l'rm#��a��)\$�\0����3\0knL*��/�#�� �\"kM\$A��,0�\nډvǒ��\r,2�������b��\"\0�H�\$?.��I�K,�J��@���������Ht�3�l�k�90��C�)���@�c��bȨH��\$���.�\n�~�a(@����\r��p�@G�v\nn\n���png�v\0�ί�-R��(,8�-�3�,fI-,\\��8m�dp��i��>��a�N�p�b�]!�[4jZ3��KК�&�-ښ��o&@G\nc�>MUJ�F\r��J�?̤�N��b`	p��\$N�p1�Т�E���ndj+\r/0�4),�����o�a\rT\$�,�T6F9��Cn�1)���\$Ύ�E�O1E�/��\\���4\$�Ѓ��D��.�\0̑���\r��H��;�ք�Hi��%n�.oIP��R���kv6�<\$�@2F*�/��E6�`�:*�p�R�t\"Tx�%�Ni�م��l\na+�Pb�;�%>�x%��\"pt����#�3�Qo�n��N���HB\$K4���QD�ų!�";
            break;
        case"ta":
            $g = "�W* �i��F�\\Hd_�����+�BQp�� 9���t\\U�����@�W��(<�\\��@1	|�@(:�\r��	�S.WA��ht�]�R&���\\�����I`�D�J�\$��:��TϠX��`�*���rj1k�,�Յz@%9���5|�Ud�ߠj䦸�����ɾ&{,��M���S_�Rj����^��8<�Z�+���e~`��- u�L��T�����tY���/2��cm���i�Ǫ�ˣi.z�aV�#k�nW{�>·#I�ϟ�yt򛥚��X�MY`ݠ���O*��)�����(�6��[<��O��[�<�c�4�*�h�*r³'��9�\\@�<��\"��ȩ\\�<��4*�qr��0��)+��6O�\\R*�%2c�\"/\n��;st�J�{�򻒋��ƨ��Ȓ���k��ɭS�ǩrm%+�\"�jj�m��*���R���(�1B��/r\$��8,���9ҋZ�Qt�R봥s����]\n��i��O'LJ���+t)\r�\"%t<ᠬ�؈����\"S4����%���E�%\0M�gT�E\"IѼ�; �ĩ\nS(�<B0�7c��7���K�f�OI�3���3�7U�[���� +�N��B�7\"V���6��\0ɲv���M,�Ͳ��o�������V:[GTK�@/0��^ϰL��\\�`���6�\0�0��P�(��E�kPn\\�w��\n;�8<��J�LR�0�9�NA:��\\�a��������uC1Ul�uA�&�s���n��Q9d���~5��s�K��2��3�;�\r�Әf�3JrS�`[=�y�a}·�\\��,��G\$�s3�^�ɱ5%��@�͍��ψ��7�W��f���WO�W�CC�NH�������Ӽ5��\":Ԡ��Ҥ�JN����\\n`���B�)�CN�z�df�O���\$�nqY�����[`U-��\n�}��4,-,��T�Xa�2%��6UZ��z�Uk��AC����8xpm�7cdW\0�Y���\0er݂	쩻 y`r0H)��h� �(��XZҔ�4UpYv�N��A0��e�,?`Lq�%�r�ђ߈\$\"����<-��1�L�_��+f���QX �9�wr�C(x�}G� \r�3�D�t\0����%�qE\r����r�xe\r҄<!�ں�\"g��9t##��?h���nP�Ԣ���|_Ø B�4��|�!������Xmh��	���D����׉#�J\n;�~��\0�\nD0�1�=�r��_�؎h�N*�\r��T00��B��V�9P'��<�䰢)sq!JÙ��XS�8���웜'EĲP5HDb�u7��ѳUȱ��:��1��\0R�h��a���ɑj���Pf>�Y�@'�0�H���k�]�ԗ�(�o�ƛ�ظ��D�k�������z1`5��Hg��~ʀ@\$ e]!��f�ߔ�8m\"4���AC\r����2�\$Hb� ������\0v\r2\$#I��hiw�L�@��\$��##h:!q�uǱ��ޜ#F��YU�i�Q�6�Z�\"�i�N�ɠW�Z�Dh_PQ�۽��j���f1VQ����\\|��x��=�{V��5��`�a��8v��js�#І�\rUp��ĩ�<��(\nҲɳ�����-��T��g��:��70o�3mjă�S1-uᢡ�pA6�s��W�8��W��!{7��(s�\nA��`pЈzH+������нJ��>�\\j0��f�&����!\r,����UL\0��JI;�����\0U\n �@���@D�0\"���M:Y�9r0_G�J�fu¸н뼎��(\n�0�4\\�)6���G���q���0��|���-+�=�K��4�t���:��i?��0�W�]��m��U���]cx�!�,Z�H J|:��W�4L/��;v��ލ��|K{H�`��v63�����C\r�!�ؔ��̘w�y���e�Cx��g˷?^�`�\$	G��+)'ǡ�BN��*r��lA�U���Ck�񫺬R�A�q��s��[V�lڬ���p#b��x����oz��E�S�]bwM⥻�lq��;;�~`��璾 ���N�`��f��+��\$4Ι7�_:��1#\r�ד���(b�c1��p;W==\\��VJ��r��=J�����KO�+~jK���}��;�?���m�]?���~_\$�q����}@>3�(�l�ʊ����=A�V���Į�R�l��,5�}��~��,����^����!���JZD�\r�W>*v���j��ʳ�|/!�o����@���~���}c��;��~�ά?U~����tq�x�~�Ϟ����2�`b̴'�\n(����	m�߇�����p\$(P(&������p���k��dg.�,��)���Z�\"���\nhU��MP5���/�D�l�Bʟ�P�P���R�D���i��D��,n�jW%��O~����jQJQ�b�hk�o	�Zd���x��Z\0�h	XDT�����N��ccx�tZPۮ��L�T�����2+ԁ�~�΄����Q �����p~	\$<\r���p�܋R�1C�\$p|a����J�\0�\$Z\0ܙ �=�\$h	\\�)������h)�\r1�gƀ�ljƩ���\$�	*7\r��9đ1dR�QDd��1�UB��R������ؐ�F�E���qܭ�1D��;q��A Qh��B� �L����H�!�:��\"]���?�o!�G##G����\n�?mI �O���j�j&č+�nk�v�1p��b�`����\nl�2D�［�B���Ђ�.�\0����S�Q,9\"�\$��*ψ�h:���+i\0� ��x/0�o���\\;\$^��\$��R�ov��P�f_%�'\$r3!��0n\\�\rb2k)���xv�\0�#1͎��	\0�;'�%�\$Ur\$O���p�og4K}4�#,1�PV�/1��~�\$�e4�2=4�@��BMN��.�/�������sЗ���\rW/�����R���,�fS�4��P��^�N�ӳ����9Ё�c�H��F�X\"�-dr�,�u����M`T��>���ʂ����K�4� ӕ51�:sX�<l���3%3r)\$�r�s2����J�[>\n>T@������ �'\nS�)���SAF���Ҹ������ަӣ5Sn�-�4�xv�V�@���̀�)�[(�>���'\nL��\n�z�H��*�&TD�����T��Se\n���Ƹ�h�ty+Q'��2���\"�2� ���Ӗ���*'_ET�C�Kp�AT.x��;�M3��#�`{.�6n/t�����bO���A	��R��@K��&�Ig7\\��G<���CBt[uj���k�8+�R�=1�O3ÝYP?���O�MЋ��'q2\0�E��wt!X��W�WՑU�9��\\'k\\�u+���1��[��\",f�:5�\\��eu����1sV��#kS`\$�`hA��\\��WG��K�bB�b����/`�;a3QT�n�Ie;\0P��AR�O,��a�\n��K�0�\0�\$m�d�BONP��v{15�6�{]�*ڳҹs�s�R��u�i�j��Y�]u�ZrJ\\��_�UxО���e�BOӻ_40X�̮e�D�h���Nm4�o��dӇ 5R��r�\nҵj�U5C3�]3k4�a�LȷS��mJ�r�{j.Ss�sTMaM[t�luED#�q���nnV�cN7r�WL�IU�t�� �N�ec�\"�@��\"a&�:Um\r2��rv�3�F��20oy�ט�T9V�UznIz�\\~s�{Dmy��l���,�.	�\r�8�_jnX���m	�\"R���[E��S~K6?oØ��:N�^�sHJس\n����1�ہtK\n� :��3�?_�J����%�.�nI����!����t�oE85�5sX& P3ƀQF��MR�w_�s��J��/o5�`�=`�`�\r��`�� � ���� ژ�����+��\r+ \r�*��ę�\n���ZN]�=��;U[\rX�%Ό�j��sd��)�m}����͏�*n3UL�8��R�y��a�n��\"�rT���p|T�#bV�Kg/l���5�kgV�Ks�I��\r��]�,u��L��\r�vx};~��*4ӆ��0�[2(8�H֋Sw�zPieN��	�(=��Yİ��_J�_��f�Kj���C�D�g\$�T9G#h'/i�B�<'��\\�C�6��28��#�����sNy�׵�D�Uy�f%{TC�R�&J3i�%E��\"���Q�h8�X�3�4\r �J�m.�È�p--�uE�����hH�Z�i��7N�zD�Gf�f��'5�)B~�ܓ�IsC12c�-��rS�Y���\0�_@ˆ\r��r���8�<�!\\2�RF�_V�MEq;p��� ���7��_����^Q6bW�IY�� �Z	�A�y�P3v~�d�X�j*1FM�����xI5�_���Ƹ�WM�) :%���A�B���{�`	\0�@�	�t\n`�";
            break;
        case"tr":
            $g = "E6�M�	�i=�BQp�� 9������ 3����!��i6`'�y�\\\nb,P!�= 2�̑H���o<�N�X�bn���)̅'��b��)��:GX���n�O����T�l&#a�A\$5��)\0(�u6&�QL�y�\\�V|�-2�Fm��z3�AD�I��e���&��G2��H���6�N��>�p�P&9�(�}7܁Eix��b��H��`B��D�	҃��G�V�Y0�'ׅ�b5��e�G&���6�j&Z���t�_,���J����x\"]�|t0�������;��b��c\"l���HK7��)��p�7��Z�\r����2	 �C4\r.h��,��:��*�D0�mH9��R��J�=4c`꩎�P�<�-\n�6��Ʋ�+�	\nb���3IԂ0��S�<��Ò�IM�T�<o+མ��D�:�s�O�D�\r���ܿ&�J�5ƅ�P� L�涢�%/b\"45���\ro��\r���N����9SsAp�63��\"� ��@b��#!\0�2������6��x��K;b�\$�¬/���9��,��+�ȟ\$�zv9�B:�<�p� m�\n6'ֹb�V��n���2�ʋb2�`@6;��̘�#-���\r��j:I�N�Q�Z�\r#h�4� P�0�(�c�K�����%x\"�E�3��:��t��l#\"7#�rJ3�鎂<1�r\r\n��91#�Z/�����H�8H����|�h%p4\r�5r�#[4��\0��0���:\$���kB%zXI�\n@�q\r{��ȠH�(��I`���M�bN��h@� x\0�Y�r9͔Ae����	������)>�q�N98�\\j��Cx֛;�˻ߊx�*0�\r}sc˅+������b���6�1(7l:�#;G:�[N��wR��9�zx1�a\0�\r��N�\r#8A(�c2`KCI�Q���@�C�%m��`�f�XrT-U���T�}\$�/�\$2�N�bdp4��k��K*`�9���\"wN	�A�������2���>ڐ����л漏\0:l�ظ��1�8D���b���g`�a�غ�9b@H%�Ұ���0������[c)�m���-2�Yy}CG�9Fx��ʿDA<'\0� A\n�W��JC2�8Q��x���bl82���!B E	�E��\$X�M��7�3x�d�K6(QӮ�\\���󖦴*/ ݑ�u\re�U��\nvVњ8�P\"	l��:���;C�I*�7��4(�\\\"3\n\$���\n�*e\r%NyZv���;�DۖR�,ˠD!\n!O��r�rg-��76�#��fora8�(�Ac�Ŋ(*+�(����w�N���VP��S5.����j�/�IJR@��E;}���*V˒D�i|ӗFk���e�)����N�DH,�J���ʸ��Ⱥ�dI�q9��'�ꅌL�	v��U��\$%5��qV�:Z��F����b��I-�`�e�iw��Wg���kJ���z��o���U�W��^�>���![j��}vV�YyX\nA4\"�d���j���%�qW�X�I8H�PĬ'�HTa�v#����D�^��c\$�)�3KQ�3��1�SÙ�J�Z��\\뭘/l0S�}EHz@��^�/\n�@f*J<ea!'������\\I���q���;�;�'��\0�Y������ީ�I(���C~��]�u��K�J`y0\$t;Kk��\r���C�G'|�,Љ��X�Y��#�c�yP˂�*o#��.�m\r�佄+��\0�_��\"5�ؑ���h�e\n�Ò��NdȻ\$ޜI�d��O)�Y\\Z;�)O�l�9c����POѬv� ��	��L�	m�w�4��ɟ8��\r������0ε�L��*u�uW���k����\0֩�M1u[�u��k�Y�>�><(�!~3�Ģ:o!i��W]=�ډnE�/h+����S�L�^�8yL��:D��G_\"�'nح�_jEis\$ظ=�upm�˾jB���j櫛>.Gz#A��\r�7��e�'	��l��۳4v�sǊ�]	Ƹ��ISK0�CŹ>S˶��xG���w�k�r�I���9(z4���a�ʆ�A\np��`ۉ|0��:X��an��<u,]�2�ܦi^p��\"��]s4nF��\"8]c�!D,P�@��l�w%U@;A݋��^gj33:�a����l����%��p��F��ZI�ӟS�RO�.Ƿ��S�wxoY�ž��3��U/����n�s�8 9>���^5=LM���ڿf�Ŝ��\" �=����7�,l��X��.���8�f��u��Tχ���Y(��^�S�0%�ȏ��@��ln�¦��I�3�X8�6�\n���Z�\r��l��@ϴ�jm%����a���MX[��Jbk*�LL��%bb�օ������9�n��@�D.grP\$�\ro:Lk�.�>Fn�'�o��\$�\$�.s��\"�\\xAx�.�If���M�*�&UP�����R'����O�tP�\n��0ĢB|� c�\$\"0��D\$��Mp�0b�NP�6/J��Ĝb̧���2G�>H,���y\$�7�ދ�x�d4?B4C�@��\r��|p�0&�=(xg��cE\0�?\0�p��P>�0���\"𼗇P5�e�d,@��f\$2ľo��g�,-���";
            break;
        case"uk":
            $g = "�I4�ɠ�h-`��&�K�BQp�� 9��	�r�h-��-}[��Z����H`R������db��rb�h�d��Z?�G��H�����\r�Ms6@Se+ȃE6�J�Td�Jsh\$g�\$�G��f�j>������l�]H_F�M<�h����Ѩ�*�6�J�29��<Oq2��y���,*Q�<΅\$XF��l��m�� cJ	�3��(`�f��U�4'X��!Iä嬾�]G�t�Lt����`m\r\\�f��sk0oi5�.*(*|�	O�2\n225ؕ�V��7���K8M��e�Nh��D� k��@��r4��m��������:��?-bj���z�*��ꣂ�*H#hiF�	B�bɤ�S-#lڬ�&(C�� 	+��Í���!P�p��Ҫ&2 ��ė�!,�ϧ0t�3�P+�P�K\rDұH���,���!-�(Tr�Opc��it�4Qh�����/qs�K�2��(HBW-!�t��2nbd�T43�ͤJ��\\)K�N�#�`���6���0��P�(��bW'%�Ӎ6�L��oY�ъ��r�����Ƕڒ�H*�\n���B� ԭ�[v�����[惵q\\�\0O�0(�Ϧ�\r}�t��:��J9*�5ޘ^6�����4H���F;7�@��ӛBэ����!�|\\���b��#HIT�\"9O��Dt�=�b��+*��h�(J��p�mI(�R���*QN:i��\\-m�&���\"���)q-0��\$�%7����*���}���\"J�*\$`Y�Q�:	�(Q'.8)�d�iH.�'�:t��8�Ʃ������`Jm�Bh�9��(�x�;���2���9�&�!\0����D4����x����6�#wdw#8^2����؍Ø�7�!x0�C8�:yB�b\ra|\$����6��x�>,��?��z`���ְCHtv��6�G�����/��h�cԠHy�����H\n\0�\r��:L�\0�����I9NZ8��6�4Ds�*\"=Ô����B*!ĵ����z8.�8�EdPɋ�U�� GIQC�)�=�h![QM(�����ڣܫ�7��\"�C�}`�]i0����	�9<�P��vnSE�5b�\0�¢�d��6��K�KHqR\"EBd��v��<ɧ*��\n�9����(>C�kp.�\\N\n��E�B�rxCxu7\0���{�1��:���`\0�^(F\n�Be���_˹�PD`��ivA��r@�Ңad��0\nZ���C�M�8��ʚZ\$����H���m�z�sr�b�;np�U�B��`m�F�zڠ�\"ohQ8.Tf�(y�E�9&� :���F¨X|�t/����Yء6SF��v.��@z�Q#�/�	�VdăP6ڪ�C�������P�0:��E���o���2�D9�.�A8����I�DF�LDbO�Y��B&Zc@J���*]S�ҵU-^��F��:#��Ы%L_��ԫR��)��?	�ҫ�����J1��.�H�W�+sL'��?K��0i�T<�5S�T����kը)4D��:*%�Aodr�Wi�F�7������9(˔uY��Y���ܳ�-���aE\$���P��ڤ����y޷F�]�(`F�����-���u�[Ħ�6���e�o=�������Ru2��N�P��4i���`��jͽ���b �	m^E#�N�;�t'�����grmF�.� �����\$��UL�\$F��f&��V�c7��4Vh�.3a���t��Ֆ�hs\$\n���v�Z.}���#g�̘3�s7����n�FyJy�T*�X�\\��C&lڤ�����7<6�'r3�P�ѣi����J��&��X1X�\"ݪ'�A%+�a<��H�%��6�U���͇p�*F��j�/�3��L�C]'\r���F��{0_G���2�\$ܷ��K~���]�n���ܶ�2k�pS�kOjN`(A��{���S(��(�H]qҮ+�ٿ�fHo�s`ZǐБ�۽��3�d,�����!��CU+�XN##FZ���g\\����+�c.�u�B[�f�I5��:�r�CM���ӌssgt�Y�Į��ƫ��٣�4�t�4�u��\$���2b�@i�*�`nl��<��qk�Fߒ�*��MM,�������&>b��)����P+�|���g<��y�mZ���F�K�Ե��-~�\"z&�g�i��lb���eJI3D�ڤh�d,��o�\"�Jp��Z�Q{ś� m�Ӑ�!���pJY�:h�ޘ[^�Y\r����ןI>����d�_�;�,/'�����4�P�B�^/�%��;*�O�F�L�0\\\n2�����d��6ک�\"\\i��T�v�(bٰ��L;��+jN�O�c(znJ0\$`K�1��\$/r_�����/�L��a`p�Ԅ�o`�M�C�}.�j�>p��P�	\r�	B�;o[O���	�z��\n�����Ɇb�����rs\r������!l<լ@�Ȁ0�\$�MFí1�q!	����flC�H��`���!k,��m�R��]+^*��bD�*B#�q��GC\0@pF������F�Bq�\r�����(J�D��@\"��j���]&��nJ+���n� M�\r�m�j�#L\$�q�HK���*�b�D>��k��ڊB���0M\$sd=n�k0]�p�Q0�� b�H�o,��'&��q�>(JB��[�&uR- b� �����w#B�I,����`��z<�Z��D<�@/�����o�8Eƌ���E@�	�DS\"1�\rЋ)28�0Y#!)��(�W*�#��2@�\r���Ee\nIC���+\$\\�l����]2ĻR�B�^�2S-R���ڴb���.(���Ń�)N��E1�\"�����12�r��H�1�.��3�(�¼4�J(�eU&��VlpI�+n�\"Q!5�c5�!6 �q�6��5�a� ���hтϲs(��ˤ������h[3��\n�ؒz�\r:L���mE;ĸs�'��ҝ������\\Q#�ҭ�;�έ�<�.Ѯ7\r���c'\rF�R�E�>�X�У=�>P��=t�A��=P�B0�BmeA����l@�e��q\0@����O40�̪�?BR� �t��LɨX ��`\0Ă	�\n���Z\0@|\0Ɓ'���\n��Au�.�Þ���gI�lC�d��<�4��\r���jT�a��%ԯ�@#�k��\$��&>�B̐KN�S/ ��\"R�\n�8�[MC�f���P����&�`4e:�lɧ7E�b�Fʲ��[�H#H��*�@�� �IuET�\nw%��ze&�iL��`A�t���Ժ=\n=F�1�T�OW0*���!V��W�I����c93%W�X0z;p1f��q�Zn�;b@�	d\\�8��S%�(��ZQj5��!��J�PQLT��=L��V�@@n)2�\n�3�:��e��!��o��Q~�\$.�b��e�*,�6l�p��ϊ=VT�5�\\�868b����D����@S��nr��Z�U��f�v���m*.�pj�lX�\rY�+?o��0p6�/�o63oA~";
            break;
        case"zh":
            $g = "�^��s�\\�r����|%��:�\$\nr.���2�r/d�Ȼ[8� S�8�r�!T�\\�s���I4�b�r��ЀJs!Kd�u�e�V���D�X�T��NTr}ʧE�VJr%С���B�S�^�t*���ΔTKR�\n�^Z�R˓�d��җZVթw:�MYV�	{=�ȺF:�*!m[C� 	W*m|�^��Nu��λ�K���3y��ȅ�%[W���\r�`�F�WI=Zew�J���21��tN�%̋T��|�t�0�s�Z���<���֎d��ЧCiW���*�/��tt�%�ZD��9՗���_(x�/�A�;�����`�o� D%��8s��RN]��\"�^��9z��q\$r�D{�L���vH �ҔC��a�J���L��EB\0NB0�6\r�\0�0�C`�c�7B��&��<]��9&r��������0��9�3�:�Cj^GL�9O��u;93��SGAL���t�\$��^�)KK��:�seA�J.t�BŃ�D9Nd2� P�:K�FJ�\0�)�B0@���9F*�IF���H����r������5\0��Q?i�\$��N���gADU�%{sn��_p�5\"��̕彍dU.Þ^�KS	[��Z�Zbh�9��(�X�;��&2���9� \\�@4c�0z\r��8Ax^;�p�2\r�H݇ب���vx<a�p�4���E+#��2��8�,��XD	#h�-\r����|�a�:\r|&:\r��5�cH�a�l����N;�IRr�.�̱���^���@(	�@so[�HG�K�D(�ai��y�ɂeL���rB/�1\\Z��1�-��DO�QA�Zi�T��|8�)��[������5cw)���=��\$,c̳9Ii�#x�K�p@:��~fdC�3���L��ND#\n�T�	�:�+���`��j\\a�ٜ+c�\"bxv�Č�\$� �I�Zj��A���A�w괶���*Y�2�����0�X�Ø@W���@��0M<󸷅�p�%Ÿ���j��s\$-�I-�W�c�`{v,�)ڊA,�ѤK�4��P�*X�� E	�2�!.o�(�C��s��'�\nGI\"�%��	�;�I�,OB��.��6��@Ũ��8�%���\"2\"�Ȁ#\"���EEܝr�Պqv�I�?&���HDj�Jlo���/�RÜM���(:s>�NJ�cġ�>�r��l^`���s4H��&��A\"L_#U7�-��5�)~��~��/&	A�<�IA���nŹ-┷@�<���)��B#4�<%�pJ��T͍��X�Q&#V�n�%�A�!j��,N�J+�r�[�������Y(#�P\$2�L��c�G��ԧP�&[Q'0�EB�B�c�zj�-¼���� M��6��p��ɴ���D4\$Ud�%p��\"9���)�s��5D*�sAx��A*#��,Y'��l����G�u5bEqG�65L�����@a���76���K�KM-���� aa�X4�J��uM뀨�+hT�ȶ5�׊�ꃐ��N#����)d���fJ��2�ķfV��C�Z,\$Ѻ��DOS�ec���LG#�#\\v���[�{oEᑷ>��im,�����;�D���Jr�lH#N��-кPZ�/��o�e?��uS��\"K0M�?��\r���=`�m�Ω؎}:����!A�Ѩ��^숋�\"�X��nc�\$,��=�4f]B!�\$�e���#.%ȦbCx�����t�/��kܩ���0!\\+�P���r����F�ܑ�),�ˣ�9;2�2�fA���U�b�����6:J��a\"���g�C��\r3�CJ�3�D�)��:i�Q�g��%,\n�j)�u2l&�Ջ��'M��P\"����\$u�N7�L	�1F�>����A�v&��ړt:^���3�S�%;��F��[NA��&��Y��^���3���>fn�ӆ0��ݓRgћ���\\��|���a�N��P<�ύ��M��@\\ [�0���C��)C����غ�I�4&�e:5�\"��\n\"�H�ܘX�aBQ�&�䆪�ɻ!D��|��Z����`+a�4�0�+�~�6T�i�kf\r!�<���B3�Ka�:��@�k�\n�P#�p�c�A�3�ZGDk�S\nin�8/`��-��[��Ʌ��\"Q7�AUv/�M��#�\rVM���\n�K#�\"�t��T�HM�	��23`����,pZ���־R�ǹ(h:�V&����^��Av�e௢�����tW�AR�V�fl�`g� 8G�C�n�6#���4��˦T��tM-�a[����%����%傲a̍i�tC�,\$\"��,%�FZ��:B\n�Z��-�z�rS*�� ã��|�¶�:3�Vd�+b�:�� ��1\0	\0�@�	�t\n`�";
            break;
        case"zh-tw":
            $g = "�^��%ӕ\\�r�����|%��u:H�B(\\�4��p�r��neRQ̡D8� S�\n�t*.t�I&�G�N��AʤS�V�:	t%9��Sy:\"<�r�ST�.�����r}ʧE��I'2q�Y���dˡB��K��B�=1@��:R��J�*)zZ]KeO��('JY'-V����4ye-D%��g\"��@,�����r��%n��ZeʺU��k�:�cz^.���YʸY�0�*�\r��-V�z�.�]˔����ȹB�� S��s\$��l]N�r��[T���KM��ȆD�S%���ȶ?kY`r�e��P�i>[��b.[�AxW�� @1#��aK��\$:ZC��p�d1�H\nY N(K	�]�g1G�i�^��YI5�{�L�1U!��8*���\$�nה�i����#�`���6�\0�1�#p)�\"a�H���H��\$����#D�?��r��̈́��5���=��\ns�d]\0��}\0���mD�ebv���a^�(Ds��/It�/R[EѰ��n]�;��\r��䋣,��\0�)�B4�7�c(ܸ�i�C���^4	��r��r�TT�1�D�)����4��p@r��,DVr����%s]�s�7YnY;�s��ig�\$�`�:\$)Km��+_��1H�im���\rA\0�c��9B�h�4�C(���\rh��C@�:�^��\\0��h�7��]���}��I�U�7��0�C8�:g��4�a|\$����6�C�x�!�@�@�4\r��7�#\r�\r2xᤍ�N�,K\"�<%�\\B��ABڐ�*�D�e�R��1ZX��(q<_ǖ�\"D)f7|���@�D��R!	zb����W�5�Gٔi�Q�)P)ؠ'�b�AI��R~S�'1pM�X�\nL���\0B�~/���a����2�[b��:�E�:��~�fc�3�`�0iL��;�f��P�����{}��7����C�Ip�E_>w�sVړ6��1TO\"�V���z�k\n��tЎqP\"��V�W�LE�X������\"DAe�0M7@#��tM�W㜃�U�FB�.�aH;�AW�w0�%F�Z~��nDs7&�V�?äF�R��`\n	�8P�T�\nB@�,�3]���#�&���ێ�B�D�aJ)L]%Uj��H��I+��(��r���*��⌥���G�Y=�(.�иs��PR�Q�?'�W��2EŠ����c⟇<ٛf�r�9�А\"�lW8�2��̽@o=G��.�����U�)�ș�쿝S���|I�Lr��L]�UQ���ą\r���HFv`��J�'ꌘ\"������X���Tͣ��%�5 �B#5*���'��	L�l����X��>/ܑfM��]�I.��\\x_0��\nT\"H�4ݷ�ij\"��+��l��>HE��':��%�lE0�^�早� �(���V�\"Z �p��R e<]E!1��\nQ|'�!�7t��j� l����TVQ��6�����Z��y�z˸L�1΄����t�2�K*�ٝ�R��i�U&��aR�s�����@a�v<��rN��~�0��@��pA��F��[� ~��0���M�LI��'��&п�DL�L9�ȼ�zס&KS����A�L	�W��'����ql\$������홻�7ϦVXZ�a�sUb�¥�jb1Q&ɑ-���G�T#D��	�Db��h�%����s8f��b�nc!�(d���iQ�� ��L-��F�5��K����,C�2���)�0�_H��o�b<�Q��o��A����{{Q*5H�b#T�I��]�g�z�Ù��ՒtÑ�\$�eŝ����ػ�\0�%����S\$4�0'�MdiB�\n���S���.�ܞ��q�b<%'�X�Rj�3}5Ly�Q�u�2ۉ���|*Nk���}���-�v8�h�&����lm%����'�mX�G���X{tQ컢&��������i\n�ݦ�;��¢�½!j�\rN����_L,�4^��u��\$3u��񗁽x�\$��\\�1�a�\"0<���ǋ���lOjd���F���J�����PJɇ�%����Y�]�i��|?����I�/=>�Z�=�7?�����\$1��ˈ��H�\$��V(�}2]s(��(\\���#j ��~��1zE���%�Ʈ�=�-|}B�~�\n�h�x��l!���\n�l\r!�5���ða\r��2���CHf-�:8@�\0�(m�}�V�!B�F��,���pgp���1`��sW�r�+q5P}�B��K���c�\$�V�	�F{'(�ᓷ�� J[��S�����#G���7NL��L\$�B�Q<KK��+&�!����%�6�����&�o\n�����6[`��e�f��L��������\r �e���\",)���F�M�%�����E�b�A*ň�-������!+�P�+\"���pR��O'��,�D�+���|\"�P�T�!N:!@a\n�hg�A����A~J�x�����@�	\0t	��@�\n`";
            break;
    }
    $ag = array();
    foreach (explode("\n", lzw_decompress($g)) as $X) $ag[] = (strpos($X, "\t") ? explode("\t", $X) : $X);
    return $ag;
}

if (!$ag) $ag = get_translations($a);
if (extension_loaded('pdo')) {
    class
    Min_PDO
        extends
        PDO
    {
        var $_result, $server_info, $affected_rows, $errno, $error;

        function
        __construct()
        {
            global $c;
            $te = array_search("SQL", $c->operators);
            if ($te !== false) unset($c->operators[$te]);
        }

        function
        dsn($Eb, $V, $pe, $Yb = 'auth_error')
        {
            set_exception_handler($Yb);
            parent::__construct($Eb, $V, $pe);
            restore_exception_handler();
            $this->setAttribute(13, array('Min_PDOStatement'));
            $this->server_info = $this->getAttribute(4);
        }

        function
        query($J, $hg = false)
        {
            $K = parent::query($J);
            $this->error = "";
            if (!$K) {
                list(, $this->errno, $this->error) = $this->errorInfo();
                return
                    false;
            }
            $this->store_result($K);
            return $K;
        }

        function
        multi_query($J)
        {
            return $this->_result = $this->query($J);
        }

        function
        store_result($K = null)
        {
            if (!$K) {
                $K = $this->_result;
                if (!$K) return
                    false;
            }
            if ($K->columnCount()) {
                $K->num_rows = $K->rowCount();
                return $K;
            }
            $this->affected_rows = $K->rowCount();
            return
                true;
        }

        function
        next_result()
        {
            if (!$this->_result) return
                false;
            $this->_result->_offset = 0;
            return @$this->_result->nextRowset();
        }

        function
        result($J, $n = 0)
        {
            $K = $this->query($J);
            if (!$K) return
                false;
            $M = $K->fetch();
            return $M[$n];
        }
    }

    class
    Min_PDOStatement
        extends
        PDOStatement
    {
        var $_offset = 0, $num_rows;

        function
        fetch_assoc()
        {
            return $this->fetch(2);
        }

        function
        fetch_row()
        {
            return $this->fetch(3);
        }

        function
        fetch_field()
        {
            $M = (object)$this->getColumnMeta($this->_offset++);
            $M->orgtable = $M->table;
            $M->orgname = $M->name;
            $M->charsetnr = (in_array("blob", (array)$M->flags) ? 63 : 0);
            return $M;
        }
    }
}
$Ab = array();
$Ab = array("server" => "MySQL") + $Ab;
if (!defined("DRIVER")) {
    $we = array("MySQLi", "MySQL", "PDO_MySQL");
    define("DRIVER", "server");
    if (extension_loaded("mysqli")) {
        class
        Min_DB
            extends
            MySQLi
        {
            var $extension = "MySQLi";

            function
            Min_DB()
            {
                parent::init();
            }

            function
            connect($P, $V, $pe)
            {
                mysqli_report(MYSQLI_REPORT_OFF);
                list($Fc, $se) = explode(":", $P, 2);
                $L = @$this->real_connect(($P != "" ? $Fc : ini_get("mysqli.default_host")), ($P . $V != "" ? $V : ini_get("mysqli.default_user")), ($P . $V . $pe != "" ? $pe : ini_get("mysqli.default_pw")), null, (is_numeric($se) ? $se : ini_get("mysqli.default_port")), (!is_numeric($se) ? $se : null));
                if ($L) {
                    if (method_exists($this, 'set_charset')) $this->set_charset("utf8"); else$this->query("SET NAMES utf8");
                }
                return $L;
            }

            function
            result($J, $n = 0)
            {
                $K = $this->query($J);
                if (!$K) return
                    false;
                $M = $K->fetch_array();
                return $M[$n];
            }

            function
            quote($tf)
            {
                return "'" . $this->escape_string($tf) . "'";
            }
        }
    } elseif (extension_loaded("mysql") && !(ini_get("sql.safe_mode") && extension_loaded("pdo_mysql"))) {
        class
        Min_DB
        {
            var $extension = "MySQL", $server_info, $affected_rows, $errno, $error, $_link, $_result;

            function
            connect($P, $V, $pe)
            {
                $this->_link = @mysql_connect(($P != "" ? $P : ini_get("mysql.default_host")), ("$P$V" != "" ? $V : ini_get("mysql.default_user")), ("$P$V$pe" != "" ? $pe : ini_get("mysql.default_password")), true, 131072);
                if ($this->_link) {
                    $this->server_info = mysql_get_server_info($this->_link);
                    if (function_exists('mysql_set_charset')) mysql_set_charset("utf8", $this->_link); else$this->query("SET NAMES utf8");
                } else$this->error = mysql_error();
                return (bool)$this->_link;
            }

            function
            quote($tf)
            {
                return "'" . mysql_real_escape_string($tf, $this->_link) . "'";
            }

            function
            select_db($mb)
            {
                return
                    mysql_select_db($mb, $this->_link);
            }

            function
            query($J, $hg = false)
            {
                $K = @($hg ? mysql_unbuffered_query($J, $this->_link) : mysql_query($J, $this->_link));
                $this->error = "";
                if (!$K) {
                    $this->errno = mysql_errno($this->_link);
                    $this->error = mysql_error($this->_link);
                    return
                        false;
                }
                if ($K === true) {
                    $this->affected_rows = mysql_affected_rows($this->_link);
                    $this->info = mysql_info($this->_link);
                    return
                        true;
                }
                return
                    new
                    Min_Result($K);
            }

            function
            multi_query($J)
            {
                return $this->_result = $this->query($J);
            }

            function
            store_result()
            {
                return $this->_result;
            }

            function
            next_result()
            {
                return
                    false;
            }

            function
            result($J, $n = 0)
            {
                $K = $this->query($J);
                if (!$K || !$K->num_rows) return
                    false;
                return
                    mysql_result($K->_result, 0, $n);
            }
        }

        class
        Min_Result
        {
            var $num_rows, $_result, $_offset = 0;

            function
            Min_Result($K)
            {
                $this->_result = $K;
                $this->num_rows = mysql_num_rows($K);
            }

            function
            fetch_assoc()
            {
                return
                    mysql_fetch_assoc($this->_result);
            }

            function
            fetch_row()
            {
                return
                    mysql_fetch_row($this->_result);
            }

            function
            fetch_field()
            {
                $L = mysql_fetch_field($this->_result, $this->_offset++);
                $L->orgtable = $L->table;
                $L->orgname = $L->name;
                $L->charsetnr = ($L->blob ? 63 : 0);
                return $L;
            }

            function
            __destruct()
            {
                mysql_free_result($this->_result);
            }
        }
    } elseif (extension_loaded("pdo_mysql")) {
        class
        Min_DB
            extends
            Min_PDO
        {
            var $extension = "PDO_MySQL";

            function
            connect($P, $V, $pe)
            {
                $this->dsn("mysql:host=" . str_replace(":", ";unix_socket=", preg_replace('~:(\\d)~', ';port=\\1', $P)), $V, $pe);
                $this->query("SET NAMES utf8");
                return
                    true;
            }

            function
            select_db($mb)
            {
                return $this->query("USE " . idf_escape($mb));
            }

            function
            query($J, $hg = false)
            {
                $this->setAttribute(1000, !$hg);
                return
                    parent::query($J, $hg);
            }
        }
    }
    function
    idf_escape($Ic)
    {
        return "`" . str_replace("`", "``", $Ic) . "`";
    }

    function
    table($Ic)
    {
        return
            idf_escape($Ic);
    }

    function
    connect()
    {
        global $c;
        $h = new
        Min_DB;
        $ib = $c->credentials();
        if ($h->connect($ib[0], $ib[1], $ib[2])) {
            $h->query("SET sql_quote_show_create = 1, autocommit = 1");
            return $h;
        }
        $L = $h->error;
        if (function_exists('iconv') && !is_utf8($L) && strlen($bf = iconv("windows-1250", "utf-8", $L)) > strlen($L)) $L = $bf;
        return $L;
    }

    function
    get_databases($nc)
    {
        global $h;
        $L = get_session("dbs");
        if ($L === null) {
            $J = ($h->server_info >= 5 ? "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA" : "SHOW DATABASES");
            $L = ($nc ? slow_query($J) : get_vals($J));
            restart_session();
            set_session("dbs", $L);
            stop_session();
        }
        return $L;
    }

    function
    limit($J, $Z, $_, $Jd = 0, $hf = " ")
    {
        return " $J$Z" . ($_ !== null ? $hf . "LIMIT $_" . ($Jd ? " OFFSET $Jd" : "") : "");
    }

    function
    limit1($J, $Z)
    {
        return
            limit($J, $Z, 1);
    }

    function
    db_collation($l, $Ta)
    {
        global $h;
        $L = null;
        $j = $h->result("SHOW CREATE DATABASE " . idf_escape($l), 1);
        if (preg_match('~ COLLATE ([^ ]+)~', $j, $C)) $L = $C[1]; elseif (preg_match('~ CHARACTER SET ([^ ]+)~', $j, $C)) $L = $Ta[$C[1]][-1];
        return $L;
    }

    function
    engines()
    {
        $L = array();
        foreach (get_rows("SHOW ENGINES") as $M) {
            if (ereg("YES|DEFAULT", $M["Support"])) $L[] = $M["Engine"];
        }
        return $L;
    }

    function
    logged_user()
    {
        global $h;
        return $h->result("SELECT USER()");
    }

    function
    tables_list()
    {
        global $h;
        return
            get_key_vals("SHOW" . ($h->server_info >= 5 ? " FULL" : "") . " TABLES");
    }

    function
    count_tables($k)
    {
        $L = array();
        foreach ($k
                 as $l) $L[$l] = count(get_vals("SHOW TABLES IN " . idf_escape($l)));
        return $L;
    }

    function
    table_status($F = "", $gc = false)
    {
        global $h;
        $L = array();
        foreach (get_rows($gc && $h->server_info >= 5 ? "SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() " . ($F != "" ? "AND TABLE_NAME = " . q($F) : "ORDER BY Name") : "SHOW TABLE STATUS" . ($F != "" ? " LIKE " . q(addcslashes($F, "%_\\")) : "")) as $M) {
            if ($M["Engine"] == "InnoDB") $M["Comment"] = preg_replace('~(?:(.+); )?InnoDB free: .*~', '\\1', $M["Comment"]);
            if (!isset($M["Engine"])) $M["Comment"] = "";
            if ($F != "") return $M;
            $L[$M["Name"]] = $M;
        }
        return $L;
    }

    function
    is_view($S)
    {
        return $S["Engine"] === null;
    }

    function
    fk_support($S)
    {
        return
            eregi("InnoDB|IBMDB2I", $S["Engine"]);
    }

    function
    fields($R)
    {
        $L = array();
        foreach (get_rows("SHOW FULL COLUMNS FROM " . table($R)) as $M) {
            preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~', $M["Type"], $C);
            $L[$M["Field"]] = array("field" => $M["Field"], "full_type" => $M["Type"], "type" => $C[1], "length" => $C[2], "unsigned" => ltrim($C[3] . $C[4]), "default" => ($M["Default"] != "" || ereg("char|set", $C[1]) ? $M["Default"] : null), "null" => ($M["Null"] == "YES"), "auto_increment" => ($M["Extra"] == "auto_increment"), "on_update" => (eregi('^on update (.+)', $M["Extra"], $C) ? $C[1] : ""), "collation" => $M["Collation"], "privileges" => array_flip(explode(",", $M["Privileges"])), "comment" => $M["Comment"], "primary" => ($M["Key"] == "PRI"),);
        }
        return $L;
    }

    function
    indexes($R, $i = null)
    {
        $L = array();
        foreach (get_rows("SHOW INDEX FROM " . table($R), $i) as $M) {
            $L[$M["Key_name"]]["type"] = ($M["Key_name"] == "PRIMARY" ? "PRIMARY" : ($M["Index_type"] == "FULLTEXT" ? "FULLTEXT" : ($M["Non_unique"] ? "INDEX" : "UNIQUE")));
            $L[$M["Key_name"]]["columns"][] = $M["Column_name"];
            $L[$M["Key_name"]]["lengths"][] = $M["Sub_part"];
            $L[$M["Key_name"]]["descs"][] = null;
        }
        return $L;
    }

    function
    foreign_keys($R)
    {
        global $h, $Qd;
        static $qe = '`(?:[^`]|``)+`';
        $L = array();
        $gb = $h->result("SHOW CREATE TABLE " . table($R), 1);
        if ($gb) {
            preg_match_all("~CONSTRAINT ($qe) FOREIGN KEY \\(((?:$qe,? ?)+)\\) REFERENCES ($qe)(?:\\.($qe))? \\(((?:$qe,? ?)+)\\)(?: ON DELETE ($Qd))?(?: ON UPDATE ($Qd))?~", $gb, $od, PREG_SET_ORDER);
            foreach ($od
                     as $C) {
                preg_match_all("~$qe~", $C[2], $mf);
                preg_match_all("~$qe~", $C[5], $If);
                $L[idf_unescape($C[1])] = array("db" => idf_unescape($C[4] != "" ? $C[3] : $C[4]), "table" => idf_unescape($C[4] != "" ? $C[4] : $C[3]), "source" => array_map('idf_unescape', $mf[0]), "target" => array_map('idf_unescape', $If[0]), "on_delete" => ($C[6] ? $C[6] : "RESTRICT"), "on_update" => ($C[7] ? $C[7] : "RESTRICT"),);
            }
        }
        return $L;
    }

    function
    view($F)
    {
        global $h;
        return
            array("select" => preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU', '', $h->result("SHOW CREATE VIEW " . table($F), 1)));
    }

    function
    collations()
    {
        $L = array();
        foreach (get_rows("SHOW COLLATION") as $M) {
            if ($M["Default"]) $L[$M["Charset"]][-1] = $M["Collation"]; else$L[$M["Charset"]][] = $M["Collation"];
        }
        ksort($L);
        foreach ($L
                 as $z => $X) asort($L[$z]);
        return $L;
    }

    function
    information_schema($l)
    {
        global $h;
        return ($h->server_info >= 5 && $l == "information_schema") || ($h->server_info >= 5.5 && $l == "performance_schema");
    }

    function
    error()
    {
        global $h;
        return
            h(preg_replace('~^You have an error.*syntax to use~U', "Syntax error", $h->error));
    }

    function
    error_line()
    {
        global $h;
        if (ereg(' at line ([0-9]+)$', $h->error, $Qe)) return $Qe[1] - 1;
    }

    function
    create_database($l, $Sa)
    {
        set_session("dbs", null);
        return
            queries("CREATE DATABASE " . idf_escape($l) . ($Sa ? " COLLATE " . q($Sa) : ""));
    }

    function
    drop_databases($k)
    {
        restart_session();
        set_session("dbs", null);
        return
            apply_queries("DROP DATABASE", $k, 'idf_escape');
    }

    function
    rename_database($F, $Sa)
    {
        if (create_database($F, $Sa)) {
            $Re = array();
            foreach (tables_list() as $R => $U) $Re[] = table($R) . " TO " . idf_escape($F) . "." . table($R);
            if (!$Re || queries("RENAME TABLE " . implode(", ", $Re))) {
                queries("DROP DATABASE " . idf_escape(DB));
                return
                    true;
            }
        }
        return
            false;
    }

    function
    auto_increment()
    {
        $xa = " PRIMARY KEY";
        if ($_GET["create"] != "" && $_POST["auto_increment_col"]) {
            foreach (indexes($_GET["create"]) as $v) {
                if (in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"], $v["columns"], true)) {
                    $xa = "";
                    break;
                }
                if ($v["type"] == "PRIMARY") $xa = " UNIQUE";
            }
        }
        return " AUTO_INCREMENT$xa";
    }

    function
    alter_table($R, $F, $o, $oc, $Xa, $Pb, $Sa, $wa, $me)
    {
        $ra = array();
        foreach ($o
                 as $n) $ra[] = ($n[1] ? ($R != "" ? ($n[0] != "" ? "CHANGE " . idf_escape($n[0]) : "ADD") : " ") . " " . implode($n[1]) . ($R != "" ? $n[2] : "") : "DROP " . idf_escape($n[0]));
        $ra = array_merge($ra, $oc);
        $qf = "COMMENT=" . q($Xa) . ($Pb ? " ENGINE=" . q($Pb) : "") . ($Sa ? " COLLATE " . q($Sa) : "") . ($wa != "" ? " AUTO_INCREMENT=$wa" : "") . $me;
        if ($R == "") return
            queries("CREATE TABLE " . table($F) . " (\n" . implode(",\n", $ra) . "\n) $qf");
        if ($R != $F) $ra[] = "RENAME TO " . table($F);
        $ra[] = $qf;
        return
            queries("ALTER TABLE " . table($R) . "\n" . implode(",\n", $ra));
    }

    function
    alter_indexes($R, $ra)
    {
        foreach ($ra
                 as $z => $X) $ra[$z] = ($X[2] == "DROP" ? "\nDROP INDEX " . idf_escape($X[1]) : "\nADD $X[0] " . ($X[0] == "PRIMARY" ? "KEY " : "") . ($X[1] != "" ? idf_escape($X[1]) . " " : "") . $X[2]);
        return
            queries("ALTER TABLE " . table($R) . implode(",", $ra));
    }

    function
    truncate_tables($Ff)
    {
        return
            apply_queries("TRUNCATE TABLE", $Ff);
    }

    function
    drop_views($wg)
    {
        return
            queries("DROP VIEW " . implode(", ", array_map('table', $wg)));
    }

    function
    drop_tables($Ff)
    {
        return
            queries("DROP TABLE " . implode(", ", array_map('table', $Ff)));
    }

    function
    move_tables($Ff, $wg, $If)
    {
        $Re = array();
        foreach (array_merge($Ff, $wg) as $R) $Re[] = table($R) . " TO " . idf_escape($If) . "." . table($R);
        return
            queries("RENAME TABLE " . implode(", ", $Re));
    }

    function
    copy_tables($Ff, $wg, $If)
    {
        queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");
        foreach ($Ff
                 as $R) {
            $F = ($If == DB ? table("copy_$R") : idf_escape($If) . "." . table($R));
            if (!queries("DROP TABLE IF EXISTS $F") || !queries("CREATE TABLE $F LIKE " . table($R)) || !queries("INSERT INTO $F SELECT * FROM " . table($R))) return
                false;
        }
        foreach ($wg
                 as $R) {
            $F = ($If == DB ? table("copy_$R") : idf_escape($If) . "." . table($R));
            $vg = view($R);
            if (!queries("DROP VIEW IF EXISTS $F") || !queries("CREATE VIEW $F AS $vg[select]")) return
                false;
        }
        return
            true;
    }

    function
    trigger($F)
    {
        if ($F == "") return
            array();
        $N = get_rows("SHOW TRIGGERS WHERE `Trigger` = " . q($F));
        return
            reset($N);
    }

    function
    triggers($R)
    {
        $L = array();
        foreach (get_rows("SHOW TRIGGERS LIKE " . q(addcslashes($R, "%_\\"))) as $M) $L[$M["Trigger"]] = array($M["Timing"], $M["Event"]);
        return $L;
    }

    function
    trigger_options()
    {
        return
            array("Timing" => array("BEFORE", "AFTER"), "Type" => array("FOR EACH ROW"),);
    }

    function
    routine($F, $U)
    {
        global $h, $Rb, $Nc, $gg;
        $pa = array("bool", "boolean", "integer", "double precision", "real", "dec", "numeric", "fixed", "national char", "national varchar");
        $fg = "((" . implode("|", array_merge(array_keys($gg), $pa)) . ")\\b(?:\\s*\\(((?:[^'\")]*|$Rb)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";
        $qe = "\\s*(" . ($U == "FUNCTION" ? "" : $Nc) . ")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$fg";
        $j = $h->result("SHOW CREATE $U " . idf_escape($F), 2);
        preg_match("~\\(((?:$qe\\s*,?)*)\\)\\s*" . ($U == "FUNCTION" ? "RETURNS\\s+$fg\\s+" : "") . "(.*)~is", $j, $C);
        $o = array();
        preg_match_all("~$qe\\s*,?~is", $C[1], $od, PREG_SET_ORDER);
        foreach ($od
                 as $he) {
            $F = str_replace("``", "`", $he[2]) . $he[3];
            $o[] = array("field" => $F, "type" => strtolower($he[5]), "length" => preg_replace_callback("~$Rb~s", 'normalize_enum', $he[6]), "unsigned" => strtolower(preg_replace('~\\s+~', ' ', trim("$he[8] $he[7]"))), "null" => 1, "full_type" => $he[4], "inout" => strtoupper($he[1]), "collation" => strtolower($he[9]),);
        }
        if ($U != "FUNCTION") return
            array("fields" => $o, "definition" => $C[11]);
        return
            array("fields" => $o, "returns" => array("type" => $C[12], "length" => $C[13], "unsigned" => $C[15], "collation" => $C[16]), "definition" => $C[17], "language" => "SQL",);
    }

    function
    routines()
    {
        return
            get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = " . q(DB));
    }

    function
    routine_languages()
    {
        return
            array();
    }

    function
    begin()
    {
        return
            queries("BEGIN");
    }

    function
    insert_into($R, $Q)
    {
        return
            queries("INSERT INTO " . table($R) . " (" . implode(", ", array_keys($Q)) . ")\nVALUES (" . implode(", ", $Q) . ")");
    }

    function
    insert_update($R, $Q, $ze)
    {
        foreach ($Q
                 as $z => $X) $Q[$z] = "$z = $X";
        $og = implode(", ", $Q);
        return
            queries("INSERT INTO " . table($R) . " SET $og ON DUPLICATE KEY UPDATE $og");
    }

    function
    last_id()
    {
        global $h;
        return $h->result("SELECT LAST_INSERT_ID()");
    }

    function
    explain($h, $J)
    {
        return $h->query("EXPLAIN " . ($h->server_info >= 5.1 ? "PARTITIONS " : "") . $J);
    }

    function
    found_rows($S, $Z)
    {
        return ($Z || $S["Engine"] != "InnoDB" ? null : $S["Rows"]);
    }

    function
    types()
    {
        return
            array();
    }

    function
    schemas()
    {
        return
            array();
    }

    function
    get_schema()
    {
        return "";
    }

    function
    set_schema($df)
    {
        return
            true;
    }

    function
    create_sql($R, $wa)
    {
        global $h;
        $L = $h->result("SHOW CREATE TABLE " . table($R), 1);
        if (!$wa) $L = preg_replace('~ AUTO_INCREMENT=\\d+~', '', $L);
        return $L;
    }

    function
    truncate_sql($R)
    {
        return "TRUNCATE " . table($R);
    }

    function
    use_sql($mb)
    {
        return "USE " . idf_escape($mb);
    }

    function
    trigger_sql($R, $vf)
    {
        $L = "";
        foreach (get_rows("SHOW TRIGGERS LIKE " . q(addcslashes($R, "%_\\")), null, "-- ") as $M) $L .= "\n" . ($vf == 'CREATE+ALTER' ? "DROP TRIGGER IF EXISTS " . idf_escape($M["Trigger"]) . ";;\n" : "") . "CREATE TRIGGER " . idf_escape($M["Trigger"]) . " $M[Timing] $M[Event] ON " . table($M["Table"]) . " FOR EACH ROW\n$M[Statement];;\n";
        return $L;
    }

    function
    show_variables()
    {
        return
            get_key_vals("SHOW VARIABLES");
    }

    function
    process_list()
    {
        return
            get_rows("SHOW FULL PROCESSLIST");
    }

    function
    show_status()
    {
        return
            get_key_vals("SHOW STATUS");
    }

    function
    convert_field($n)
    {
        if (ereg("binary", $n["type"])) return "HEX(" . idf_escape($n["field"]) . ")";
        if ($n["type"] == "bit") return "BIN(" . idf_escape($n["field"]) . " + 0)";
        if (ereg("geometry|point|linestring|polygon", $n["type"])) return "AsWKT(" . idf_escape($n["field"]) . ")";
    }

    function
    unconvert_field($n, $L)
    {
        if (ereg("binary", $n["type"])) $L = "UNHEX($L)";
        if ($n["type"] == "bit") $L = "CONV($L, 2, 10) + 0";
        if (ereg("geometry|point|linestring|polygon", $n["type"])) $L = "GeomFromText($L)";
        return $L;
    }

    function
    support($hc)
    {
        global $h;
        return !ereg("scheme|sequence|type" . ($h->server_info < 5.1 ? "|event|partitioning" . ($h->server_info < 5 ? "|view|routine|trigger" : "") : ""), $hc);
    }

    $y = "sql";
    $gg = array();
    $uf = array();
    foreach (array(lang(11) => array("tinyint" => 3, "smallint" => 5, "mediumint" => 8, "int" => 10, "bigint" => 20, "decimal" => 66, "float" => 12, "double" => 21), lang(12) => array("date" => 10, "datetime" => 19, "timestamp" => 19, "time" => 10, "year" => 4), lang(13) => array("char" => 255, "varchar" => 65535, "tinytext" => 255, "text" => 65535, "mediumtext" => 16777215, "longtext" => 4294967295), lang(14) => array("enum" => 65535, "set" => 64), lang(15) => array("bit" => 20, "binary" => 255, "varbinary" => 65535, "tinyblob" => 255, "blob" => 65535, "mediumblob" => 16777215, "longblob" => 4294967295), lang(16) => array("geometry" => 0, "point" => 0, "linestring" => 0, "polygon" => 0, "multipoint" => 0, "multilinestring" => 0, "multipolygon" => 0, "geometrycollection" => 0),) as $z => $X) {
        $gg += $X;
        $uf[$z] = array_keys($X);
    }
    $ng = array("unsigned", "zerofill", "unsigned zerofill");
    $Ud = array("=", "<", ">", "<=", ">=", "!=", "LIKE", "LIKE %%", "REGEXP", "IN", "IS NULL", "NOT LIKE", "NOT REGEXP", "NOT IN", "IS NOT NULL", "SQL");
    $xc = array("char_length", "date", "from_unixtime", "lower", "round", "sec_to_time", "time_to_sec", "upper");
    $Ac = array("avg", "count", "count distinct", "group_concat", "max", "min", "sum");
    $Hb = array(array("char" => "md5/sha1/password/encrypt/uuid", "binary" => "md5/sha1", "date|time" => "now",), array("(^|[^o])int|float|double|decimal" => "+/-", "date" => "+ interval/- interval", "time" => "addtime/subtime", "char|text" => "concat",));
}
define("SERVER", $_GET[DRIVER]);
define("DB", $_GET["db"]);
define("ME", preg_replace('~^[^?]*/([^?]*).*~', '\\1', $_SERVER["REQUEST_URI"]) . '?' . (sid() ? SID . '&' : '') . (SERVER !== null ? DRIVER . "=" . urlencode(SERVER) . '&' : '') . (isset($_GET["username"]) ? "username=" . urlencode($_GET["username"]) . '&' : '') . (DB != "" ? 'db=' . urlencode(DB) . '&' . (isset($_GET["ns"]) ? "ns=" . urlencode($_GET["ns"]) . "&" : "") : ''));
$fa = "3.7.1";

class
Adminer
{
    var $operators;

    function
    name()
    {
        return "<a href='http://www.adminer.org/' id='h1'>Adminer</a>";
    }

    function
    credentials()
    {
        return
            array(SERVER, $_GET["username"], get_session("pwds"));
    }

    function
    permanentLogin($j = false)
    {
        return
            password_file($j);
    }

    function
    database()
    {
        return
            DB;
    }

    function
    databases($nc = true)
    {
        return
            get_databases($nc);
    }

    function
    queryTimeout()
    {
        return
            5;
    }

    function
    headers()
    {
        return
            true;
    }

    function
    head()
    {
        return
            true;
    }

    function
    loginForm()
    {
        global $Ab;
        echo '<table cellspacing="0">
<tr><th>', lang(17), '<td>', html_select("auth[driver]", $Ab, DRIVER, "loginDriver(this);"), '<tr><th>', lang(18), '<td><input name="auth[server]" value="', h(SERVER), '" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>', lang(19), '<td><input name="auth[username]" id="username" value="', h($_GET["username"]), '" autocapitalize="off">
<tr><th>', lang(20), '<td><input type="password" name="auth[password]">
<tr><th>', lang(21), '<td><input name="auth[db]" value="', h($_GET["db"]);?>" autocapitalize="off">
        </table>
        <script type="text/javascript">
            var username = document.getElementById('username');
            focus(username);
            username.form['auth[driver]'].onchange();
        </script>
        <?php

        echo "<p><input type='submit' value='" . lang(22) . "'>\n", checkbox("auth[permanent]", 1, $_COOKIE["adminer_permanent"], lang(23)) . "\n";
    }

    function
    login($md, $pe)
    {
        return
            true;
    }

    function
    tableName($Af)
    {
        return
            h($Af["Name"]);
    }

    function
    fieldName($n, $Xd = 0)
    {
        return '<span title="' . h($n["full_type"]) . '">' . h($n["field"]) . '</span>';
    }

    function
    selectLinks($Af, $Q = "")
    {
        echo '<p class="tabs">';
        $ld = array("select" => lang(24), "table" => lang(25));
        if (is_view($Af)) $ld["view"] = lang(26); else$ld["create"] = lang(27);
        if ($Q !== null) $ld["edit"] = lang(28);
        foreach ($ld
                 as $z => $X) echo " <a href='" . h(ME) . "$z=" . urlencode($Af["Name"]) . ($z == "edit" ? $Q : "") . "'" . bold(isset($_GET[$z])) . ">$X</a>";
        echo "\n";
    }

    function
    foreignKeys($R)
    {
        return
            foreign_keys($R);
    }

    function
    backwardKeys($R, $_f)
    {
        return
            array();
    }

    function
    backwardKeysPrint($za, $M)
    {
    }

    function
    selectQuery($J)
    {
        global $y, $T;
        return "<form action='" . h(ME) . "sql=' method='post'><p><span onclick=\"return !selectEditSql(event, this, '" . lang(29) . "');\">" . "<code class='jush-$y'>" . h(str_replace("\n", " ", $J)) . "</code>" . " <a href='" . h(ME) . "sql=" . urlencode($J) . "'>" . lang(30) . "</a>" . "</span><input type='hidden' name='token' value='$T'></p></form>\n";
    }

    function
    rowDescription($R)
    {
        return "";
    }

    function
    rowDescriptions($N, $pc)
    {
        return $N;
    }

    function
    selectLink($X, $n)
    {
    }

    function
    selectVal($X, $A, $n)
    {
        $L = ($X === null ? "<i>NULL</i>" : (ereg("char|binary", $n["type"]) && !ereg("var", $n["type"]) ? "<code>$X</code>" : $X));
        if (ereg('blob|bytea|raw|file', $n["type"]) && !is_utf8($X)) $L = lang(31, strlen(html_entity_decode($X, ENT_QUOTES)));
        return ($A ? "<a href='" . h($A) . "'>$L</a>" : $L);
    }

    function
    editVal($X, $n)
    {
        return $X;
    }

    function
    selectColumnsPrint($O, $f)
    {
        global $xc, $Ac;
        print_fieldset("select", lang(32), $O);
        $t = 0;
        $vc = array(lang(33) => $xc, lang(34) => $Ac);
        foreach ($O
                 as $z => $X) {
            $X = $_GET["columns"][$z];
            echo "<div>" . html_select("columns[$t][fun]", array(-1 => "") + $vc, $X["fun"]), "(<select name='columns[$t][col]' onchange='selectFieldChange(this.form);'><option>" . optionlist($f, $X["col"], true) . "</select>)</div>\n";
            $t++;
        }
        echo "<div>" . html_select("columns[$t][fun]", array(-1 => "") + $vc, "", "this.nextSibling.nextSibling.onchange();"), "(<select name='columns[$t][col]' onchange='selectAddRow(this);'><option>" . optionlist($f, null, true) . "</select>)</div>\n", "</div></fieldset>\n";
    }

    function
    selectSearchPrint($Z, $f, $w)
    {
        print_fieldset("search", lang(35), $Z);
        foreach ($w
                 as $t => $v) {
            if ($v["type"] == "FULLTEXT") {
                echo "(<i>" . implode("</i>, <i>", array_map('h', $v["columns"])) . "</i>) AGAINST", " <input type='search' name='fulltext[$t]' value='" . h($_GET["fulltext"][$t]) . "' onchange='selectFieldChange(this.form);'>", checkbox("boolean[$t]", 1, isset($_GET["boolean"][$t]), "BOOL"), "<br>\n";
            }
        }
        $_GET["where"] = (array)$_GET["where"];
        reset($_GET["where"]);
        $Ia = "this.nextSibling.onchange();";
        for ($t = 0; $t <= count($_GET["where"]); $t++) {
            list(, $X) = each($_GET["where"]);
            if (!$X || ("$X[col]$X[val]" != "" && in_array($X["op"], $this->operators))) {
                echo "<div><select name='where[$t][col]' onchange='$Ia'><option value=''>(" . lang(36) . ")" . optionlist($f, $X["col"], true) . "</select>", html_select("where[$t][op]", $this->operators, $X["op"], $Ia), "<input type='search' name='where[$t][val]' value='" . h($X["val"]) . "' onchange='" . ($X ? "selectFieldChange(this.form)" : "selectAddRow(this)") . ";' onsearch='selectSearchSearch(this);'></div>\n";
            }
        }
        echo "</div></fieldset>\n";
    }

    function
    selectOrderPrint($Xd, $f, $w)
    {
        print_fieldset("sort", lang(37), $Xd);
        $t = 0;
        foreach ((array)$_GET["order"] as $z => $X) {
            if (isset($f[$X])) {
                echo "<div><select name='order[$t]' onchange='selectFieldChange(this.form);'><option>" . optionlist($f, $X, true) . "</select>", checkbox("desc[$t]", 1, isset($_GET["desc"][$z]), lang(38)) . "</div>\n";
                $t++;
            }
        }
        echo "<div><select name='order[$t]' onchange='selectAddRow(this);'><option>" . optionlist($f, null, true) . "</select>", checkbox("desc[$t]", 1, false, lang(38)) . "</div>\n", "</div></fieldset>\n";
    }

    function
    selectLimitPrint($_)
    {
        echo "<fieldset><legend>" . lang(39) . "</legend><div>";
        echo "<input type='number' name='limit' class='size' value='" . h($_) . "' onchange='selectFieldChange(this.form);'>", "</div></fieldset>\n";
    }

    function
    selectLengthPrint($Nf)
    {
        if ($Nf !== null) {
            echo "<fieldset><legend>" . lang(40) . "</legend><div>", "<input type='number' name='text_length' class='size' value='" . h($Nf) . "'>", "</div></fieldset>\n";
        }
    }

    function
    selectActionPrint($w)
    {
        echo "<fieldset><legend>" . lang(41) . "</legend><div>", "<input type='submit' value='" . lang(32) . "'>", " <span id='noindex' title='" . lang(42) . "'></span>", "<script type='text/javascript'>\n", "var indexColumns = ";
        $f = array();
        foreach ($w
                 as $v) {
            if ($v["type"] != "FULLTEXT") $f[reset($v["columns"])] = 1;
        }
        $f[""] = 1;
        foreach ($f
                 as $z => $X) json_row($z);
        echo ";\n", "selectFieldChange(document.getElementById('form'));\n", "</script>\n", "</div></fieldset>\n";
    }

    function
    selectCommandPrint()
    {
        return !information_schema(DB);
    }

    function
    selectImportPrint()
    {
        return !information_schema(DB);
    }

    function
    selectEmailPrint($Lb, $f)
    {
    }

    function
    selectColumnsProcess($f, $w)
    {
        global $xc, $Ac;
        $O = array();
        $zc = array();
        foreach ((array)$_GET["columns"] as $z => $X) {
            if ($X["fun"] == "count" || (isset($f[$X["col"]]) && (!$X["fun"] || in_array($X["fun"], $xc) || in_array($X["fun"], $Ac)))) {
                $O[$z] = apply_sql_function($X["fun"], (isset($f[$X["col"]]) ? idf_escape($X["col"]) : "*"));
                if (!in_array($X["fun"], $Ac)) $zc[] = $O[$z];
            }
        }
        return
            array($O, $zc);
    }

    function
    selectSearchProcess($o, $w)
    {
        global $y;
        $L = array();
        foreach ($w
                 as $t => $v) {
            if ($v["type"] == "FULLTEXT" && $_GET["fulltext"][$t] != "") $L[] = "MATCH (" . implode(", ", array_map('idf_escape', $v["columns"])) . ") AGAINST (" . q($_GET["fulltext"][$t]) . (isset($_GET["boolean"][$t]) ? " IN BOOLEAN MODE" : "") . ")";
        }
        foreach ((array)$_GET["where"] as $X) {
            if ("$X[col]$X[val]" != "" && in_array($X["op"], $this->operators)) {
                $Za = " $X[op]";
                if (ereg('IN$', $X["op"])) {
                    $Kc = process_length($X["val"]);
                    $Za .= " (" . ($Kc != "" ? $Kc : "NULL") . ")";
                } elseif ($X["op"] == "SQL") $Za = " $X[val]";
                elseif ($X["op"] == "LIKE %%") $Za = " LIKE " . $this->processInput($o[$X["col"]], "%$X[val]%");
                elseif (!ereg('NULL$', $X["op"])) $Za .= " " . $this->processInput($o[$X["col"]], $X["val"]);
                if ($X["col"] != "") $L[] = idf_escape($X["col"]) . $Za; else {
                    $Ua = array();
                    foreach ($o
                             as $F => $n) {
                        $Tc = ereg('char|text|enum|set', $n["type"]);
                        if ((is_numeric($X["val"]) || !ereg('(^|[^o])int|float|double|decimal|bit', $n["type"])) && (!ereg("[\x80-\xFF]", $X["val"]) || $Tc)) {
                            $F = idf_escape($F);
                            $Ua[] = ($y == "sql" && $Tc && !ereg('^utf8', $n["collation"]) ? "CONVERT($F USING utf8)" : $F);
                        }
                    }
                    $L[] = ($Ua ? "(" . implode("$Za OR ", $Ua) . "$Za)" : "0");
                }
            }
        }
        return $L;
    }

    function
    selectOrderProcess($o, $w)
    {
        $L = array();
        foreach ((array)$_GET["order"] as $z => $X) {
            if (isset($o[$X]) || preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~', $X)) $L[] = (isset($o[$X]) ? idf_escape($X) : $X) . (isset($_GET["desc"][$z]) ? " DESC" : "");
        }
        return $L;
    }

    function
    selectLimitProcess()
    {
        return (isset($_GET["limit"]) ? $_GET["limit"] : "50");
    }

    function
    selectLengthProcess()
    {
        return (isset($_GET["text_length"]) ? $_GET["text_length"] : "100");
    }

    function
    selectEmailProcess($Z, $pc)
    {
        return
            false;
    }

    function
    selectQueryBuild($O, $Z, $zc, $Xd, $_, $H)
    {
        return "";
    }

    function
    messageQuery($J)
    {
        global $y;
        restart_session();
        $Dc =& get_session("queries");
        $u = "sql-" . count($Dc[$_GET["db"]]);
        if (strlen($J) > 1e6) $J = ereg_replace('[\x80-\xFF]+$', '', substr($J, 0, 1e6)) . "\n...";
        $Dc[$_GET["db"]][] = array($J, time());
        return " <span class='time'>" . @date("H:i:s") . "</span> <a href='#$u' onclick=\"return !toggle('$u');\">" . lang(43) . "</a><div id='$u' class='hidden'><pre><code class='jush-$y'>" . shorten_utf8($J, 1000) . '</code></pre><p><a href="' . h(str_replace("db=" . urlencode(DB), "db=" . urlencode($_GET["db"]), ME) . 'sql=&history=' . (count($Dc[$_GET["db"]]) - 1)) . '">' . lang(30) . '</a></div>';
    }

    function
    editFunctions($n)
    {
        global $Hb;
        $L = ($n["null"] ? "NULL/" : "");
        foreach ($Hb
                 as $z => $xc) {
            if (!$z || (!isset($_GET["call"]) && (isset($_GET["select"]) || where($_GET)))) {
                foreach ($xc
                         as $qe => $X) {
                    if (!$qe || ereg($qe, $n["type"])) $L .= "/$X";
                }
                if ($z && !ereg('set|blob|bytea|raw|file', $n["type"])) $L .= "/SQL";
            }
        }
        return
            explode("/", $L);
    }

    function
    editInput($R, $n, $va, $Y)
    {
        if ($n["type"] == "enum") return (isset($_GET["select"]) ? "<label><input type='radio'$va value='-1' checked><i>" . lang(6) . "</i></label> " : "") . ($n["null"] ? "<label><input type='radio'$va value=''" . ($Y !== null || isset($_GET["select"]) ? "" : " checked") . "><i>NULL</i></label> " : "") . enum_input("radio", $va, $n, $Y, 0);
        return "";
    }

    function
    processInput($n, $Y, $r = "")
    {
        if ($r == "SQL") return $Y;
        $F = $n["field"];
        $L = q($Y);
        if (ereg('^(now|getdate|uuid)$', $r)) $L = "$r()"; elseif (ereg('^current_(date|timestamp)$', $r)) $L = $r;
        elseif (ereg('^([+-]|\\|\\|)$', $r)) $L = idf_escape($F) . " $r $L";
        elseif (ereg('^[+-] interval$', $r)) $L = idf_escape($F) . " $r " . (preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i", $Y) ? $Y : $L);
        elseif (ereg('^(addtime|subtime|concat)$', $r)) $L = "$r(" . idf_escape($F) . ", $L)";
        elseif (ereg('^(md5|sha1|password|encrypt)$', $r)) $L = "$r($L)";
        return
            unconvert_field($n, $L);
    }

    function
    dumpOutput()
    {
        $L = array('text' => lang(44), 'file' => lang(45));
        if (function_exists('gzencode')) $L['gz'] = 'gzip';
        return $L;
    }

    function
    dumpFormat()
    {
        return
            array('sql' => 'SQL', 'csv' => 'CSV,', 'csv;' => 'CSV;', 'tsv' => 'TSV');
    }

    function
    dumpDatabase($l)
    {
    }

    function
    dumpTable($R, $vf, $Uc = 0)
    {
        if ($_POST["format"] != "sql") {
            echo "\xef\xbb\xbf";
            if ($vf) dump_csv(array_keys(fields($R)));
        } elseif ($vf) {
            if ($Uc == 2) {
                $o = array();
                foreach (fields($R) as $F => $n) $o[] = idf_escape($F) . " $n[full_type]";
                $j = "CREATE TABLE " . table($R) . " (" . implode(", ", $o) . ")";
            } else$j = create_sql($R, $_POST["auto_increment"]);
            if ($j) {
                if ($vf == "DROP+CREATE" || $Uc == 1) echo "DROP " . ($Uc == 2 ? "VIEW" : "TABLE") . " IF EXISTS " . table($R) . ";\n";
                if ($Uc == 1) $j = remove_definer($j);
                echo "$j;\n\n";
            }
        }
    }

    function
    dumpData($R, $vf, $J)
    {
        global $h, $y;
        $qd = ($y == "sqlite" ? 0 : 1048576);
        if ($vf) {
            if ($_POST["format"] == "sql") {
                if ($vf == "TRUNCATE+INSERT") echo
                    truncate_sql($R) . ";\n";
                $o = fields($R);
            }
            $K = $h->query($J, 1);
            if ($K) {
                $Pc = "";
                $Ga = "";
                $Wc = array();
                $xf = "";
                $ic = ($R != '' ? 'fetch_assoc' : 'fetch_row');
                while ($M = $K->$ic()) {
                    if (!$Wc) {
                        $tg = array();
                        foreach ($M
                                 as $X) {
                            $n = $K->fetch_field();
                            $Wc[] = $n->name;
                            $z = idf_escape($n->name);
                            $tg[] = "$z = VALUES($z)";
                        }
                        $xf = ($vf == "INSERT+UPDATE" ? "\nON DUPLICATE KEY UPDATE " . implode(", ", $tg) : "") . ";\n";
                    }
                    if ($_POST["format"] != "sql") {
                        if ($vf == "table") {
                            dump_csv($Wc);
                            $vf = "INSERT";
                        }
                        dump_csv($M);
                    } else {
                        if (!$Pc) $Pc = "INSERT INTO " . table($R) . " (" . implode(", ", array_map('idf_escape', $Wc)) . ") VALUES";
                        foreach ($M
                                 as $z => $X) {
                            $n = $o[$z];
                            $M[$z] = ($X !== null ? unconvert_field($n, ereg('(^|[^o])int|float|double|decimal', $n["type"]) && $X != '' ? $X : q($X)) : "NULL");
                        }
                        $bf = ($qd ? "\n" : " ") . "(" . implode(",\t", $M) . ")";
                        if (!$Ga) $Ga = $Pc . $bf; elseif (strlen($Ga) + 4 + strlen($bf) + strlen($xf) < $qd) $Ga .= ",$bf";
                        else {
                            echo $Ga . $xf;
                            $Ga = $Pc . $bf;
                        }
                    }
                }
                if ($Ga) echo $Ga . $xf;
            } elseif ($_POST["format"] == "sql") echo "-- " . str_replace("\n", " ", $h->error) . "\n";
        }
    }

    function
    dumpFilename($Hc)
    {
        return
            friendly_url($Hc != "" ? $Hc : (SERVER != "" ? SERVER : "localhost"));
    }

    function
    dumpHeaders($Hc, $Bd = false)
    {
        $fe = $_POST["output"];
        $dc = (ereg('sql', $_POST["format"]) ? "sql" : ($Bd ? "tar" : "csv"));
        header("Content-Type: " . ($fe == "gz" ? "application/x-gzip" : ($dc == "tar" ? "application/x-tar" : ($dc == "sql" || $fe != "file" ? "text/plain" : "text/csv") . "; charset=utf-8")));
        if ($fe == "gz") ob_start('gzencode', 1e6);
        return $dc;
    }

    function
    homepage()
    {
        echo '<p>' . ($_GET["ns"] == "" ? '<a href="' . h(ME) . 'database=">' . lang(46) . "</a>\n" : ""), (support("scheme") ? "<a href='" . h(ME) . "scheme='>" . ($_GET["ns"] != "" ? lang(47) : lang(48)) . "</a>\n" : ""), ($_GET["ns"] !== "" ? '<a href="' . h(ME) . 'schema=">' . lang(49) . "</a>\n" : ""), (support("privileges") ? "<a href='" . h(ME) . "privileges='>" . lang(50) . "</a>\n" : "");
        return
            true;
    }

    function
    navigation($Ad)
    {
        global $fa, $T, $y, $Ab;
        echo '<h1>
', $this->name(), ' <span class="version">', $fa, '</span>
<a href="http://www.adminer.org/#download" id="version">', (version_compare($fa, $_COOKIE["adminer_version"]) < 0 ? h($_COOKIE["adminer_version"]) : ""), '</a>
</h1>
';
        if ($Ad == "auth") {
            $mc = true;
            foreach ((array)$_SESSION["pwds"] as $_b => $jf) {
                foreach ($jf
                         as $P => $sg) {
                    foreach ($sg
                             as $V => $pe) {
                        if ($pe !== null) {
                            if ($mc) {
                                echo "<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";
                                $mc = false;
                            }
                            $pb = $_SESSION["db"][$_b][$P][$V];
                            foreach (($pb ? array_keys($pb) : array("")) as $l) echo "<a href='" . h(auth_url($_b, $P, $V, $l)) . "'>($Ab[$_b]) " . h($V . ($P != "" ? "@$P" : "") . ($l != "" ? " - $l" : "")) . "</a><br>\n";
                        }
                    }
                }
            }
        } else {
            echo '<form action="" method="post">
<p class="logout">
';
            if (DB == "" || !$Ad) {
                echo "<a href='" . h(ME) . "sql='" . bold(isset($_GET["sql"])) . " title='" . lang(51) . "'>" . lang(43) . "</a>\n";
                if (support("dump")) echo "<a href='" . h(ME) . "dump=" . urlencode(isset($_GET["table"]) ? $_GET["table"] : $_GET["select"]) . "' id='dump'" . bold(isset($_GET["dump"])) . ">" . lang(52) . "</a>\n";
            }
            echo '<input type="submit" name="logout" value="', lang(53), '" id="logout">
<input type="hidden" name="token" value="', $T, '">
</p>
</form>
';
            $this->databasesPrint($Ad);
            if ($_GET["ns"] !== "" && !$Ad && DB != "") {
                echo '<p><a href="' . h(ME) . 'create="' . bold($_GET["create"] === "") . ">" . lang(54) . "</a>\n";
                $Ff = table_status('', true);
                if (!$Ff) echo "<p class='message'>" . lang(7) . "\n"; else {
                    $this->tablesPrint($Ff);
                    $ld = array();
                    foreach ($Ff
                             as $R => $U) $ld[] = preg_quote($R, '/');
                    echo "<script type='text/javascript'>\n", "var jushLinks = { $y: [ '" . js_escape(ME) . "table=\$&', /\\b(" . implode("|", $ld) . ")\\b/g ] };\n";
                    foreach (array("bac", "bra", "sqlite_quo", "mssql_bra") as $X) echo "jushLinks.$X = jushLinks.$y;\n";
                    echo "</script>\n";
                }
            }
        }
    }

    function
    databasesPrint($Ad)
    {
        global $h;
        $k = $this->databases();
        echo '<form action="">
<p id="dbs">
';
        hidden_fields_get();
        $nb = " onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'";
        echo($k ? "<select name='db'$nb>" . optionlist(array("" => "(" . lang(55) . ")") + $k, DB) . "</select>" : '<input name="db" value="' . h(DB) . '" autocapitalize="off">'), "<input type='submit' value='" . lang(10) . "'" . ($k ? " class='hidden'" : "") . ">\n";
        if ($Ad != "db" && DB != "" && $h->select_db(DB)) {
        }
        echo(isset($_GET["sql"]) ? '<input type="hidden" name="sql" value="">' : (isset($_GET["schema"]) ? '<input type="hidden" name="schema" value="">' : (isset($_GET["dump"]) ? '<input type="hidden" name="dump" value="">' : ""))), "</p></form>\n";
    }

    function
    tablesPrint($Ff)
    {
        echo "<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";
        foreach ($Ff
                 as $R => $qf) {
            echo '<a href="' . h(ME) . 'select=' . urlencode($R) . '"' . bold($_GET["select"] == $R || $_GET["edit"] == $R) . ">" . lang(56) . "</a> ", '<a href="' . h(ME) . 'table=' . urlencode($R) . '"' . bold(in_array($R, array($_GET["table"], $_GET["create"], $_GET["indexes"], $_GET["foreign"], $_GET["trigger"]))) . " title='" . lang(25) . "'>" . $this->tableName($qf) . "</a><br>\n";
        }
    }
}

$c = (function_exists('adminer_object') ? adminer_object() : new
Adminer);
if ($c->operators === null) $c->operators = $Ud;
function
page_header($Qf, $m = "", $Fa = array(), $Rf = "")
{
    global $a, $c, $h, $Ab;
    header("Content-Type: text/html; charset=utf-8");
    if ($c->headers()) {
        header("X-Frame-Options: deny");
        header("X-XSS-Protection: 0");
    }
    $Sf = $Qf . ($Rf != "" ? ": " . h($Rf) : "");
    $Tf = strip_tags($Sf . (SERVER != "" && SERVER != "localhost" ? h(" - " . SERVER) : "") . " - " . $c->name());
    echo '<!DOCTYPE html>
<html lang="', $a, '" dir="', lang(57), '">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>', $Tf, '</title>
<link rel="stylesheet" type="text/css" href="', h(preg_replace("~\\?.*~", "", ME)) . "?file=default.css&amp;version=3.7.1", '">
<script type="text/javascript" src="', h(preg_replace("~\\?.*~", "", ME)) . "?file=functions.js&amp;version=3.7.1", '"></script>
';
    if ($c->head()) {
        echo '<link rel="shortcut icon" type="image/x-icon" href="', h(preg_replace("~\\?.*~", "", ME)) . "?file=favicon.ico&amp;version=3.7.1", '">
<link rel="apple-touch-icon" href="', h(preg_replace("~\\?.*~", "", ME)) . "?file=favicon.ico&amp;version=3.7.1", '">
';
        if (file_exists("adminer.css")) {
            echo '<link rel="stylesheet" type="text/css" href="adminer.css">
';
        }
    }
    echo '
<body class="', lang(57), ' nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);" onload="bodyLoad(\'', (is_object($h) ? substr($h->server_info, 0, 3) : ""), '\');', (isset($_COOKIE["adminer_version"]) ? "" : " verifyVersion();"), '">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="content">
';
    if ($Fa !== null) {
        $A = substr(preg_replace('~(username|db|ns)=[^&]*&~', '', ME), 0, -1);
        echo '<p id="breadcrumb"><a href="' . h($A ? $A : ".") . '">' . $Ab[DRIVER] . '</a> &raquo; ';
        $A = substr(preg_replace('~(db|ns)=[^&]*&~', '', ME), 0, -1);
        $P = (SERVER != "" ? h(SERVER) : lang(18));
        if ($Fa === false) echo "$P\n"; else {
            echo "<a href='" . ($A ? h($A) : ".") . "' accesskey='1' title='Alt+Shift+1'>$P</a> &raquo; ";
            if ($_GET["ns"] != "" || (DB != "" && is_array($Fa))) echo '<a href="' . h($A . "&db=" . urlencode(DB) . (support("scheme") ? "&ns=" : "")) . '">' . h(DB) . '</a> &raquo; ';
            if (is_array($Fa)) {
                if ($_GET["ns"] != "") echo '<a href="' . h(substr(ME, 0, -1)) . '">' . h($_GET["ns"]) . '</a> &raquo; ';
                foreach ($Fa
                         as $z => $X) {
                    $tb = (is_array($X) ? $X[1] : $X);
                    if ($tb != "") echo '<a href="' . h(ME . "$z=") . urlencode(is_array($X) ? $X[0] : $X) . '">' . h($tb) . '</a> &raquo; ';
                }
            }
            echo "$Qf\n";
        }
    }
    echo "<h2>$Sf</h2>\n";
    restart_session();
    $pg = preg_replace('~^[^?]*~', '', $_SERVER["REQUEST_URI"]);
    $zd = $_SESSION["messages"][$pg];
    if ($zd) {
        echo "<div class='message'>" . implode("</div>\n<div class='message'>", $zd) . "</div>\n";
        unset($_SESSION["messages"][$pg]);
    }
    $k =& get_session("dbs");
    if (DB != "" && $k && !in_array(DB, $k, true)) $k = null;
    stop_session();
    if ($m) echo "<div class='error'>$m</div>\n";
    define("PAGE_HEADER", 1);
}

function
page_footer($Ad = "")
{
    global $c;
    echo '</div>

';
    switch_lang();
    echo '<div id="menu">
';
    $c->navigation($Ad);
    echo '</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';
}

function
int32($E)
{
    while ($E >= 2147483648) $E -= 4294967296;
    while ($E <= -2147483649) $E += 4294967296;
    return (int)$E;
}

function
long2str($W, $yg)
{
    $bf = '';
    foreach ($W
             as $X) $bf .= pack('V', $X);
    if ($yg) return
        substr($bf, 0, end($W));
    return $bf;
}

function
str2long($bf, $yg)
{
    $W = array_values(unpack('V*', str_pad($bf, 4 * ceil(strlen($bf) / 4), "\0")));
    if ($yg) $W[] = strlen($bf);
    return $W;
}

function
xxtea_mx($Cg, $Bg, $yf, $Vc)
{
    return
        int32((($Cg >> 5 & 0x7FFFFFF) ^ $Bg << 2) + (($Bg >> 3 & 0x1FFFFFFF) ^ $Cg << 4)) ^ int32(($yf ^ $Bg) + ($Vc ^ $Cg));
}

function
encrypt_string($sf, $z)
{
    if ($sf == "") return "";
    $z = array_values(unpack("V*", pack("H*", md5($z))));
    $W = str2long($sf, true);
    $E = count($W) - 1;
    $Cg = $W[$E];
    $Bg = $W[0];
    $I = floor(6 + 52 / ($E + 1));
    $yf = 0;
    while ($I-- > 0) {
        $yf = int32($yf + 0x9E3779B9);
        $Gb = $yf >> 2 & 3;
        for ($ge = 0; $ge < $E; $ge++) {
            $Bg = $W[$ge + 1];
            $Cd = xxtea_mx($Cg, $Bg, $yf, $z[$ge & 3 ^ $Gb]);
            $Cg = int32($W[$ge] + $Cd);
            $W[$ge] = $Cg;
        }
        $Bg = $W[0];
        $Cd = xxtea_mx($Cg, $Bg, $yf, $z[$ge & 3 ^ $Gb]);
        $Cg = int32($W[$E] + $Cd);
        $W[$E] = $Cg;
    }
    return
        long2str($W, false);
}

function
decrypt_string($sf, $z)
{
    if ($sf == "") return "";
    if (!$z) return
        false;
    $z = array_values(unpack("V*", pack("H*", md5($z))));
    $W = str2long($sf, false);
    $E = count($W) - 1;
    $Cg = $W[$E];
    $Bg = $W[0];
    $I = floor(6 + 52 / ($E + 1));
    $yf = int32($I * 0x9E3779B9);
    while ($yf) {
        $Gb = $yf >> 2 & 3;
        for ($ge = $E; $ge > 0; $ge--) {
            $Cg = $W[$ge - 1];
            $Cd = xxtea_mx($Cg, $Bg, $yf, $z[$ge & 3 ^ $Gb]);
            $Bg = int32($W[$ge] - $Cd);
            $W[$ge] = $Bg;
        }
        $Cg = $W[$E];
        $Cd = xxtea_mx($Cg, $Bg, $yf, $z[$ge & 3 ^ $Gb]);
        $Bg = int32($W[0] - $Cd);
        $W[0] = $Bg;
        $yf = int32($yf - 0x9E3779B9);
    }
    return
        long2str($W, true);
}

$h = '';
$T = $_SESSION["token"];
if (!$_SESSION["token"]) $_SESSION["token"] = rand(1, 1e6);
$re = array();
if ($_COOKIE["adminer_permanent"]) {
    foreach (explode(" ", $_COOKIE["adminer_permanent"]) as $X) {
        list($z) = explode(":", $X);
        $re[$z] = $X;
    }
}
$d = $_POST["auth"];
if ($d) {
    session_regenerate_id();
    $_SESSION["pwds"][$d["driver"]][$d["server"]][$d["username"]] = $d["password"];
    $_SESSION["db"][$d["driver"]][$d["server"]][$d["username"]][$d["db"]] = true;
    if ($d["permanent"]) {
        $z = base64_encode($d["driver"]) . "-" . base64_encode($d["server"]) . "-" . base64_encode($d["username"]) . "-" . base64_encode($d["db"]);
        $Ae = $c->permanentLogin(true);
        $re[$z] = "$z:" . base64_encode($Ae ? encrypt_string($d["password"], $Ae) : "");
        cookie("adminer_permanent", implode(" ", $re));
    }
    if (count($_POST) == 1 || DRIVER != $d["driver"] || SERVER != $d["server"] || $_GET["username"] !== $d["username"] || DB != $d["db"]) redirect(auth_url($d["driver"], $d["server"], $d["username"], $d["db"]));
} elseif ($_POST["logout"]) {
    if ($T && $_POST["token"] != $T) {
        page_header(lang(53), lang(58));
        page_footer("db");
        exit;
    } else {
        foreach (array("pwds", "db", "dbs", "queries") as $z) set_session($z, null);
        unset_permanent();
        redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~', '', ME), 0, -1), lang(59));
    }
} elseif ($re && !$_SESSION["pwds"]) {
    session_regenerate_id();
    $Ae = $c->permanentLogin();
    foreach ($re
             as $z => $X) {
        list(, $Ma) = explode(":", $X);
        list($_b, $P, $V, $l) = array_map('base64_decode', explode("-", $z));
        $_SESSION["pwds"][$_b][$P][$V] = decrypt_string(base64_decode($Ma), $Ae);
        $_SESSION["db"][$_b][$P][$V][$l] = true;
    }
}
function
unset_permanent()
{
    global $re;
    foreach ($re
             as $z => $X) {
        list($_b, $P, $V, $l) = array_map('base64_decode', explode("-", $z));
        if ($_b == DRIVER && $P == SERVER && $V == $_GET["username"] && $l == DB) unset($re[$z]);
    }
    cookie("adminer_permanent", implode(" ", $re));
}

function
auth_error($Xb = null)
{
    global $h, $c, $T;
    $kf = session_name();
    $m = "";
    if (!$_COOKIE[$kf] && $_GET[$kf] && ini_bool("session.use_only_cookies")) $m = lang(60); elseif (isset($_GET["username"])) {
        if (($_COOKIE[$kf] || $_GET[$kf]) && !$T) $m = lang(61); else {
            $pe =& get_session("pwds");
            if ($pe !== null) {
                $m = h($Xb ? $Xb->getMessage() : (is_string($h) ? $h : lang(62)));
                if ($pe === false) $m .= '<br>' . lang(63, '<code>permanentLogin()</code>');
                $pe = null;
            }
            unset_permanent();
        }
    }
    page_header(lang(22), $m, null);
    echo "<form action='' method='post'>\n";
    $c->loginForm();
    echo "<div>";
    hidden_fields($_POST, array("auth"));
    echo "</div>\n", "</form>\n";
    page_footer("auth");
}

if (isset($_GET["username"])) {
    if (!class_exists("Min_DB")) {
        unset($_SESSION["pwds"][DRIVER]);
        unset_permanent();
        page_header(lang(64), lang(65, implode(", ", $we)), false);
        page_footer("auth");
        exit;
    }
    $h = connect();
}
if (is_string($h) || !$c->login($_GET["username"], get_session("pwds"))) {
    auth_error();
    exit;
}
$T = $_SESSION["token"];
if ($d && $_POST["token"]) $_POST["token"] = $T;
$m = '';
if ($_POST) {
    if ($_POST["token"] != $T) {
        $Mc = "max_input_vars";
        $ud = ini_get($Mc);
        if (extension_loaded("suhosin")) {
            foreach (array("suhosin.request.max_vars", "suhosin.post.max_vars") as $z) {
                $X = ini_get($z);
                if ($X && (!$ud || $X < $ud)) {
                    $Mc = $z;
                    $ud = $X;
                }
            }
        }
        $m = (!$_POST["token"] && $ud ? lang(66, "'$Mc'") : lang(58));
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $m = lang(67, "'post_max_size'");
    if (isset($_GET["sql"])) $m .= ' ' . lang(68);
}
if (!ini_bool("session.use_cookies") || @ini_set("session.use_cookies", false) !== false) {
    session_cache_limiter("");
    session_write_close();
}
function
connect_error()
{
    global $c, $h, $T, $m, $Ab;
    $k = array();
    if (DB != "") {
        header("HTTP/1.1 404 Not Found");
        page_header(lang(21) . ": " . h(DB), lang(69), true);
    } else {
        if ($_POST["db"] && !$m) queries_redirect(substr(ME, 0, -1), lang(70), drop_databases($_POST["db"]));
        page_header(lang(71), $m, false);
        echo "<p><a href='" . h(ME) . "database='>" . lang(72) . "</a>\n";
        foreach (array('privileges' => lang(50), 'processlist' => lang(73), 'variables' => lang(74), 'status' => lang(75),) as $z => $X) {
            if (support($z)) echo "<a href='" . h(ME) . "$z='>$X</a>\n";
        }
        echo "<p>" . lang(76, $Ab[DRIVER], "<b>$h->server_info</b>", "<b>$h->extension</b>") . "\n", "<p>" . lang(77, "<b>" . h(logged_user()) . "</b>") . "\n";
        $Oe = "<a href='" . h(ME) . "refresh=1'>" . lang(78) . "</a>\n";
        $k = $c->databases();
        if ($k) {
            $ef = support("scheme");
            $Ta = collations();
            echo "<form action='' method='post'>\n", "<table cellspacing='0' class='checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n", "<thead><tr><td>&nbsp;<th>" . lang(21) . "<td>" . lang(79) . "<td>" . lang(80) . "</thead>\n";
            foreach ($k
                     as $l) {
                $Xe = h(ME) . "db=" . urlencode($l);
                echo "<tr" . odd() . "><td>" . checkbox("db[]", $l, in_array($l, (array)$_POST["db"])), "<th><a href='$Xe'>" . h($l) . "</a>", "<td><a href='$Xe" . ($ef ? "&amp;ns=" : "") . "&amp;database=' title='" . lang(46) . "'>" . nbsp(db_collation($l, $Ta)) . "</a>", "<td align='right'><a href='$Xe&amp;schema=' id='tables-" . h($l) . "' title='" . lang(49) . "'>?</a>", "\n";
            }
            echo "</table>\n", "<script type='text/javascript'>tableCheck();</script>\n", "<p><input type='submit' name='drop' value='" . lang(81) . "'" . confirm("formChecked(this, /db/)") . ">\n", "<input type='hidden' name='token' value='$T'>\n", $Oe, "</form>\n";
        } else
            echo "<p>$Oe";
    }
    page_footer("db");
    if ($k) echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=connect');</script>\n";
}

if (isset($_GET["status"])) $_GET["variables"] = $_GET["status"];
if (!(DB != "" ? $h->select_db(DB) : isset($_GET["sql"]) || isset($_GET["dump"]) || isset($_GET["database"]) || isset($_GET["processlist"]) || isset($_GET["privileges"]) || isset($_GET["user"]) || isset($_GET["variables"]) || $_GET["script"] == "connect" || $_GET["script"] == "kill")) {
    if (DB != "" || $_GET["refresh"]) {
        restart_session();
        set_session("dbs", null);
    }
    connect_error();
    exit;
}
function
select($K, $i = null, $Gc = "", $ae = array())
{
    $ld = array();
    $w = array();
    $f = array();
    $Da = array();
    $gg = array();
    $L = array();
    odd('');
    for ($t = 0; $M = $K->fetch_row(); $t++) {
        if (!$t) {
            echo "<table cellspacing='0' class='nowrap'>\n", "<thead><tr>";
            for ($x = 0; $x < count($M); $x++) {
                $n = $K->fetch_field();
                $F = $n->name;
                $Zd = $n->orgtable;
                $Yd = $n->orgname;
                $L[$n->table] = $Zd;
                if ($Gc) $ld[$x] = ($F == "table" ? "table=" : ($F == "possible_keys" ? "indexes=" : null)); elseif ($Zd != "") {
                    if (!isset($w[$Zd])) {
                        $w[$Zd] = array();
                        foreach (indexes($Zd, $i) as $v) {
                            if ($v["type"] == "PRIMARY") {
                                $w[$Zd] = array_flip($v["columns"]);
                                break;
                            }
                        }
                        $f[$Zd] = $w[$Zd];
                    }
                    if (isset($f[$Zd][$Yd])) {
                        unset($f[$Zd][$Yd]);
                        $w[$Zd][$Yd] = $x;
                        $ld[$x] = $Zd;
                    }
                }
                if ($n->charsetnr == 63) $Da[$x] = true;
                $gg[$x] = $n->type;
                $F = h($F);
                echo "<th" . ($Zd != "" || $n->name != $Yd ? " title='" . h(($Zd != "" ? "$Zd." : "") . $Yd) . "'" : "") . ">" . ($Gc ? "<a href='$Gc" . strtolower($F) . "' target='_blank' rel='noreferrer' class='help'>$F</a>" : $F);
            }
            echo "</thead>\n";
        }
        echo "<tr" . odd() . ">";
        foreach ($M
                 as $z => $X) {
            if ($X === null) $X = "<i>NULL</i>"; elseif ($Da[$z] && !is_utf8($X)) $X = "<i>" . lang(31, strlen($X)) . "</i>";
            elseif (!strlen($X)) $X = "&nbsp;";
            else {
                $X = h($X);
                if ($gg[$z] == 254) $X = "<code>$X</code>";
            }
            if (isset($ld[$z]) && !$f[$ld[$z]]) {
                if ($Gc) {
                    $R = $M[array_search("table=", $ld)];
                    $A = $ld[$z] . urlencode($ae[$R] != "" ? $ae[$R] : $R);
                } else {
                    $A = "edit=" . urlencode($ld[$z]);
                    foreach ($w[$ld[$z]] as $Qa => $x) $A .= "&where" . urlencode("[" . bracket_escape($Qa) . "]") . "=" . urlencode($M[$x]);
                }
                $X = "<a href='" . h(ME . $A) . "'>$X</a>";
            }
            echo "<td>$X";
        }
    }
    echo ($t ? "</table>" : "<p class='message'>" . lang(82)) . "\n";
    return $L;
}

function
referencable_primary($gf)
{
    $L = array();
    foreach (table_status('', true) as $Bf => $R) {
        if ($Bf != $gf && fk_support($R)) {
            foreach (fields($Bf) as $n) {
                if ($n["primary"]) {
                    if ($L[$Bf]) {
                        unset($L[$Bf]);
                        break;
                    }
                    $L[$Bf] = $n;
                }
            }
        }
    }
    return $L;
}

function
textarea($F, $Y, $N = 10, $Ua = 80)
{
    echo "<textarea name='$F' rows='$N' cols='$Ua' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return textareaKeydown(this, event);'>";
    if (is_array($Y)) {
        foreach ($Y
                 as $X) echo
            h($X[0]) . "\n\n\n";
    } else
        echo
        h($Y);
    echo "</textarea>";
}

function
edit_type($z, $n, $Ta, $q = array())
{
    global $uf, $gg, $ng, $Qd;
    echo '<td><select name="', $z, '[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">', optionlist((!$n["type"] || isset($gg[$n["type"]]) ? array() : array($n["type"])) + $uf + ($q ? array(lang(83) => $q) : array()), $n["type"]), '</select>
<td><input name="', $z, '[length]" value="', h($n["length"]), '" size="3" onfocus="editingLengthFocus(this);"><td class="options">';
    echo "<select name='$z" . "[collation]'" . (ereg('(char|text|enum|set)$', $n["type"]) ? "" : " class='hidden'") . '><option value="">(' . lang(84) . ')' . optionlist($Ta, $n["collation"]) . '</select>', ($ng ? "<select name='$z" . "[unsigned]'" . (!$n["type"] || ereg('((^|[^o])int|float|double|decimal)$', $n["type"]) ? "" : " class='hidden'") . '><option>' . optionlist($ng, $n["unsigned"]) . '</select>' : ''), (isset($n['on_update']) ? "<select name='$z" . "[on_update]'" . ($n["type"] == "timestamp" ? "" : " class='hidden'") . '>' . optionlist(array("" => "(" . lang(85) . ")", "CURRENT_TIMESTAMP"), $n["on_update"]) . '</select>' : ''), ($q ? "<select name='$z" . "[on_delete]'" . (ereg("`", $n["type"]) ? "" : " class='hidden'") . "><option value=''>(" . lang(86) . ")" . optionlist(explode("|", $Qd), $n["on_delete"]) . "</select> " : " ");
}

function
process_length($id)
{
    global $Rb;
    return (preg_match("~^\\s*(?:$Rb)(?:\\s*,\\s*(?:$Rb))*\\s*\$~", $id) && preg_match_all("~$Rb~", $id, $od) ? implode(",", $od[0]) : preg_replace('~[^0-9,+-]~', '', $id));
}

function
process_type($n, $Ra = "COLLATE")
{
    global $ng;
    return " $n[type]" . ($n["length"] != "" ? "(" . process_length($n["length"]) . ")" : "") . (ereg('(^|[^o])int|float|double|decimal', $n["type"]) && in_array($n["unsigned"], $ng) ? " $n[unsigned]" : "") . (ereg('char|text|enum|set', $n["type"]) && $n["collation"] ? " $Ra " . q($n["collation"]) : "");
}

function
process_field($n, $eg)
{
    return
        array(idf_escape(trim($n["field"])), process_type($eg), ($n["null"] ? " NULL" : " NOT NULL"), (isset($n["default"]) ? " DEFAULT " . ((ereg("time", $n["type"]) && eregi('^CURRENT_TIMESTAMP$', $n["default"])) || ($n["type"] == "bit" && ereg("^([0-9]+|b'[0-1]+')\$", $n["default"])) ? $n["default"] : q($n["default"])) : ""), ($n["type"] == "timestamp" && $n["on_update"] ? " ON UPDATE $n[on_update]" : ""), (support("comment") && $n["comment"] != "" ? " COMMENT " . q($n["comment"]) : ""), ($n["auto_increment"] ? auto_increment() : null),);
}

function
type_class($U)
{
    foreach (array('char' => 'text', 'date' => 'time|year', 'binary' => 'blob', 'enum' => 'set',) as $z => $X) {
        if (ereg("$z|$X", $U)) return " class='$z'";
    }
}

function
edit_fields($o, $Ta, $U = "TABLE", $q = array(), $Ya = false)
{
    global $h, $Nc;
    echo '<thead><tr class="wrap">
';
    if ($U == "PROCEDURE") {
        echo '<td>&nbsp;';
    }
    echo '<th>', ($U == "TABLE" ? lang(87) : lang(88)), '<td>', lang(89), '<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>', lang(90), '<td>', lang(91);
    if ($U == "TABLE") {
        echo '<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="', lang(92), '">AI</acronym>
<td>', lang(93), (support("comment") ? "<td" . ($Ya ? "" : " class='hidden'") . ">" . lang(94) : "");
    }
    echo '<td>', "<input type='image' class='icon' name='add[" . (support("move_col") ? 0 : count($o)) . "]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(95) . "'>", '<script type="text/javascript">row_count = ', count($o), ';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';
    foreach ($o
             as $t => $n) {
        $t++;
        $be = $n[($_POST ? "orig" : "field")];
        $yb = (isset($_POST["add"][$t - 1]) || (isset($n["field"]) && !$_POST["drop_col"][$t])) && (support("drop_col") || $be == "");
        echo '<tr', ($yb ? "" : " style='display: none;'"), '>
', ($U == "PROCEDURE" ? "<td>" . html_select("fields[$t][inout]", explode("|", $Nc), $n["inout"]) : ""), '<th>';
        if ($yb) {
            echo '<input name="fields[', $t, '][field]" value="', h($n["field"]), '" onchange="', ($n["field"] != "" || count($o) > 1 ? "" : "editingAddRow(this); "), 'editingNameChange(this);" maxlength="64" autocapitalize="off">';
        }
        echo '<input type="hidden" name="fields[', $t, '][orig]" value="', h($be), '">
';
        edit_type("fields[$t]", $n, $Ta, $q);
        if ($U == "TABLE") {
            echo '<td>', checkbox("fields[$t][null]", 1, $n["null"], "", "", "block"), '<td><label class="block"><input type="radio" name="auto_increment_col" value="', $t, '"';
            if ($n["auto_increment"]) {
                echo ' checked';
            }?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }"></label><td><?php
            echo
            checkbox("fields[$t][has_default]", 1, $n["has_default"]), '<input name="fields[', $t, '][default]" value="', h($n["default"]), '" onchange="this.previousSibling.checked = true;">
', (support("comment") ? "<td" . ($Ya ? "" : " class='hidden'") . "><input name='fields[$t][comment]' value='" . h($n["comment"]) . "' maxlength='" . ($h->server_info >= 5.5 ? 1024 : 255) . "'>" : "");
        }
        echo "<td>", (support("move_col") ? "<input type='image' class='icon' name='add[$t]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(95) . "' onclick='return !editingAddRow(this, 1);'>&nbsp;" . "<input type='image' class='icon' name='up[$t]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=up.gif&amp;version=3.7.1' alt='^' title='" . lang(96) . "'>&nbsp;" . "<input type='image' class='icon' name='down[$t]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=down.gif&amp;version=3.7.1' alt='v' title='" . lang(97) . "'>&nbsp;" : ""), ($be == "" || support("drop_col") ? "<input type='image' class='icon' name='drop_col[$t]' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=cross.gif&amp;version=3.7.1' alt='x' title='" . lang(98) . "' onclick='return !editingRemoveRow(this);'>" : ""), "\n";
    }
}

function
process_fields(&$o)
{
    ksort($o);
    $Jd = 0;
    if ($_POST["up"]) {
        $cd = 0;
        foreach ($o
                 as $z => $n) {
            if (key($_POST["up"]) == $z) {
                unset($o[$z]);
                array_splice($o, $cd, 0, array($n));
                break;
            }
            if (isset($n["field"])) $cd = $Jd;
            $Jd++;
        }
    } elseif ($_POST["down"]) {
        $rc = false;
        foreach ($o
                 as $z => $n) {
            if (isset($n["field"]) && $rc) {
                unset($o[key($_POST["down"])]);
                array_splice($o, $Jd, 0, array($rc));
                break;
            }
            if (key($_POST["down"]) == $z) $rc = $n;
            $Jd++;
        }
    } elseif ($_POST["add"]) {
        $o = array_values($o);
        array_splice($o, key($_POST["add"]), 0, array(array()));
    } elseif (!$_POST["drop_col"]) return
        false;
    return
        true;
}

function
normalize_enum($C)
{
    return "'" . str_replace("'", "''", addcslashes(stripcslashes(str_replace($C[0][0] . $C[0][0], $C[0][0], substr($C[0], 1, -1))), '\\')) . "'";
}

function
grant($s, $Ce, $f, $Pd)
{
    if (!$Ce) return
        true;
    if ($Ce == array("ALL PRIVILEGES", "GRANT OPTION")) return ($s == "GRANT" ? queries("$s ALL PRIVILEGES$Pd WITH GRANT OPTION") : queries("$s ALL PRIVILEGES$Pd") && queries("$s GRANT OPTION$Pd"));
    return
        queries("$s " . preg_replace('~(GRANT OPTION)\\([^)]*\\)~', '\\1', implode("$f, ", $Ce) . $f) . $Pd);
}

function
drop_create($Bb, $j, $Cb, $Lf, $Db, $B, $yd, $wd, $xd, $Md, $Fd)
{
    if ($_POST["drop"]) query_redirect($Bb, $B, $yd); elseif ($Md == "") query_redirect($j, $B, $xd);
    elseif ($Md != $Fd) {
        $hb = queries($j);
        queries_redirect($B, $wd, $hb && queries($Bb));
        if ($hb) queries($Cb);
    } else
        queries_redirect($B, $wd, queries($Lf) && queries($Db) && queries($Bb) && queries($j));
}

function
create_trigger($Pd, $M)
{
    global $y;
    $Pf = " $M[Timing] $M[Event]";
    return "CREATE TRIGGER " . idf_escape($M["Trigger"]) . ($y == "mssql" ? $Pd . $Pf : $Pf . $Pd) . rtrim(" $M[Type]\n$M[Statement]", ";") . ";";
}

function
create_routine($Ye, $M)
{
    global $Nc;
    $Q = array();
    $o = (array)$M["fields"];
    ksort($o);
    foreach ($o
             as $n) {
        if ($n["field"] != "") $Q[] = (ereg("^($Nc)\$", $n["inout"]) ? "$n[inout] " : "") . idf_escape($n["field"]) . process_type($n, "CHARACTER SET");
    }
    return "CREATE $Ye " . idf_escape(trim($M["name"])) . " (" . implode(", ", $Q) . ")" . (isset($_GET["function"]) ? " RETURNS" . process_type($M["returns"], "CHARACTER SET") : "") . ($M["language"] ? " LANGUAGE $M[language]" : "") . rtrim("\n$M[definition]", ";") . ";";
}

function
remove_definer($J)
{
    return
        preg_replace('~^([A-Z =]+) DEFINER=`' . preg_replace('~@(.*)~', '`@`(%|\\1)', logged_user()) . '`~', '\\1', $J);
}

function
tar_file($kc, $Uf)
{
    $L = pack("a100a8a8a8a12a12", $kc, 644, 0, 0, decoct($Uf->size), decoct(time()));
    $La = 8 * 32;
    for ($t = 0; $t < strlen($L); $t++) $La += ord($L[$t]);
    $L .= sprintf("%06o", $La) . "\0 ";
    echo $L, str_repeat("\0", 512 - strlen($L));
    $Uf->send();
    echo
    str_repeat("\0", 511 - ($Uf->size + 511) % 512);
}

function
ini_bytes($Mc)
{
    $X = ini_get($Mc);
    switch (strtolower(substr($X, -1))) {
        case'g':
            $X *= 1024;
        case'm':
            $X *= 1024;
        case'k':
            $X *= 1024;
    }
    return $X;
}

$Qd = "RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";

class
TmpFile
{
    var $handler;
    var $size;

    function
    TmpFile()
    {
        $this->handler = tmpfile();
    }

    function
    write($cb)
    {
        $this->size += strlen($cb);
        fwrite($this->handler, $cb);
    }

    function
    send()
    {
        fseek($this->handler, 0);
        fpassthru($this->handler);
        fclose($this->handler);
    }
}

$Rb = "'(?:''|[^'\\\\]|\\\\.)*+'";
$Nc = "IN|OUT|INOUT";
if (isset($_GET["select"]) && ($_POST["edit"] || $_POST["clone"]) && !$_POST["save"]) $_GET["edit"] = $_GET["select"];
if (isset($_GET["callf"])) $_GET["call"] = $_GET["callf"];
if (isset($_GET["function"])) $_GET["procedure"] = $_GET["function"];
if (isset($_GET["download"])) {
    $b = $_GET["download"];
    $o = fields($b);
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . friendly_url("$b-" . implode("_", $_GET["where"])) . "." . friendly_url($_GET["field"]));
    echo $h->result("SELECT" . limit(idf_escape($_GET["field"]) . " FROM " . table($b), " WHERE " . where($_GET, $o), 1));
    exit;
} elseif (isset($_GET["table"])) {
    $b = $_GET["table"];
    $o = fields($b);
    if (!$o) $m = error();
    $S = table_status1($b, true);
    page_header(($o && is_view($S) ? lang(99) : lang(100)) . ": " . h($b), $m);
    $c->selectLinks($S);
    $Xa = $S["Comment"];
    if ($Xa != "") echo "<p>" . lang(94) . ": " . h($Xa) . "\n";
    if ($o) {
        echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(101) . "<td>" . lang(89) . (support("comment") ? "<td>" . lang(94) : "") . "</thead>\n";
        foreach ($o
                 as $n) {
            echo "<tr" . odd() . "><th>" . h($n["field"]), "<td title='" . h($n["collation"]) . "'>" . h($n["full_type"]) . ($n["null"] ? " <i>NULL</i>" : "") . ($n["auto_increment"] ? " <i>" . lang(92) . "</i>" : ""), (isset($n["default"]) ? " [<b>" . h($n["default"]) . "</b>]" : ""), (support("comment") ? "<td>" . nbsp($n["comment"]) : ""), "\n";
        }
        echo "</table>\n";
        if (!is_view($S)) {
            echo "<h3 id='indexes'>" . lang(102) . "</h3>\n";
            $w = indexes($b);
            if ($w) {
                echo "<table cellspacing='0'>\n";
                foreach ($w
                         as $F => $v) {
                    ksort($v["columns"]);
                    $_e = array();
                    foreach ($v["columns"] as $z => $X) $_e[] = "<i>" . h($X) . "</i>" . ($v["lengths"][$z] ? "(" . $v["lengths"][$z] . ")" : "") . ($v["descs"][$z] ? " DESC" : "");
                    echo "<tr title='" . h($F) . "'><th>$v[type]<td>" . implode(", ", $_e) . "\n";
                }
                echo "</table>\n";
            }
            echo '<p><a href="' . h(ME) . 'indexes=' . urlencode($b) . '">' . lang(103) . "</a>\n";
            if (fk_support($S)) {
                echo "<h3 id='foreign-keys'>" . lang(83) . "</h3>\n";
                $q = foreign_keys($b);
                if ($q) {
                    echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(104) . "<td>" . lang(105) . "<td>" . lang(86) . "<td>" . lang(85) . ($y != "sqlite" ? "<td>&nbsp;" : "") . "</thead>\n";
                    foreach ($q
                             as $F => $p) {
                        echo "<tr title='" . h($F) . "'>", "<th><i>" . implode("</i>, <i>", array_map('h', $p["source"])) . "</i>", "<td><a href='" . h($p["db"] != "" ? preg_replace('~db=[^&]*~', "db=" . urlencode($p["db"]), ME) : ($p["ns"] != "" ? preg_replace('~ns=[^&]*~', "ns=" . urlencode($p["ns"]), ME) : ME)) . "table=" . urlencode($p["table"]) . "'>" . ($p["db"] != "" ? "<b>" . h($p["db"]) . "</b>." : "") . ($p["ns"] != "" ? "<b>" . h($p["ns"]) . "</b>." : "") . h($p["table"]) . "</a>", "(<i>" . implode("</i>, <i>", array_map('h', $p["target"])) . "</i>)", "<td>" . nbsp($p["on_delete"]) . "\n", "<td>" . nbsp($p["on_update"]) . "\n", ($y == "sqlite" ? "" : '<td><a href="' . h(ME . 'foreign=' . urlencode($b) . '&name=' . urlencode($F)) . '">' . lang(106) . '</a>');
                    }
                    echo "</table>\n";
                }
                if ($y != "sqlite") echo '<p><a href="' . h(ME) . 'foreign=' . urlencode($b) . '">' . lang(107) . "</a>\n";
            }
            if (support("trigger")) {
                echo "<h3 id='triggers'>" . lang(108) . "</h3>\n";
                $dg = triggers($b);
                if ($dg) {
                    echo "<table cellspacing='0'>\n";
                    foreach ($dg
                             as $z => $X) echo "<tr valign='top'><td>$X[0]<td>$X[1]<th>" . h($z) . "<td><a href='" . h(ME . 'trigger=' . urlencode($b) . '&name=' . urlencode($z)) . "'>" . lang(106) . "</a>\n";
                    echo "</table>\n";
                }
                echo '<p><a href="' . h(ME) . 'trigger=' . urlencode($b) . '">' . lang(109) . "</a>\n";
            }
        }
    }
} elseif (isset($_GET["schema"])) {
    page_header(lang(49), "", array(), DB . ($_GET["ns"] ? ".$_GET[ns]" : ""));
    $Cf = array();
    $Df = array();
    $F = "adminer_schema";
    $da = ($_GET["schema"] ? $_GET["schema"] : $_COOKIE[($_COOKIE["$F-" . DB] ? "$F-" . DB : $F)]);
    preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~', $da, $od, PREG_SET_ORDER);
    foreach ($od
             as $t => $C) {
        $Cf[$C[1]] = array($C[2], $C[3]);
        $Df[] = "\n\t'" . js_escape($C[1]) . "': [ $C[2], $C[3] ]";
    }
    $Wf = 0;
    $Aa = -1;
    $df = array();
    $Ne = array();
    $gd = array();
    foreach (table_status('', true) as $R => $S) {
        if (is_view($S)) continue;
        $te = 0;
        $df[$R]["fields"] = array();
        foreach (fields($R) as $F => $n) {
            $te += 1.25;
            $n["pos"] = $te;
            $df[$R]["fields"][$F] = $n;
        }
        $df[$R]["pos"] = ($Cf[$R] ? $Cf[$R] : array($Wf, 0));
        foreach ($c->foreignKeys($R) as $X) {
            if (!$X["db"]) {
                $ed = $Aa;
                if ($Cf[$R][1] || $Cf[$X["table"]][1]) $ed = min(floatval($Cf[$R][1]), floatval($Cf[$X["table"]][1])) - 1; else$Aa -= .1;
                while ($gd[(string)$ed]) $ed -= .0001;
                $df[$R]["references"][$X["table"]][(string)$ed] = array($X["source"], $X["target"]);
                $Ne[$X["table"]][$R][(string)$ed] = $X["target"];
                $gd[(string)$ed] = true;
            }
        }
        $Wf = max($Wf, $df[$R]["pos"][0] + 2.5 + $te);
    }
    echo '<div id="schema" style="height: ', $Wf, 'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {', implode(",", $Df) . "\n", '};
var em = document.getElementById(\'schema\').offsetHeight / ', $Wf, ';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'', js_escape(DB), '\');
};
</script>
';
    foreach ($df
             as $F => $R) {
        echo "<div class='table' style='top: " . $R["pos"][0] . "em; left: " . $R["pos"][1] . "em;' onmousedown='schemaMousedown(this, event);'>", '<a href="' . h(ME) . 'table=' . urlencode($F) . '"><b>' . h($F) . "</b></a>";
        foreach ($R["fields"] as $n) {
            $X = '<span' . type_class($n["type"]) . ' title="' . h($n["full_type"] . ($n["null"] ? " NULL" : '')) . '">' . h($n["field"]) . '</span>';
            echo "<br>" . ($n["primary"] ? "<i>$X</i>" : $X);
        }
        foreach ((array)$R["references"] as $Jf => $Pe) {
            foreach ($Pe
                     as $ed => $Ke) {
                $fd = $ed - $Cf[$F][1];
                $t = 0;
                foreach ($Ke[0] as $mf) echo "\n<div class='references' title='" . h($Jf) . "' id='refs$ed-" . ($t++) . "' style='left: $fd" . "em; top: " . $R["fields"][$mf]["pos"] . "em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: " . (-$fd) . "em;'></div></div>";
            }
        }
        foreach ((array)$Ne[$F] as $Jf => $Pe) {
            foreach ($Pe
                     as $ed => $f) {
                $fd = $ed - $Cf[$F][1];
                $t = 0;
                foreach ($f
                         as $If) echo "\n<div class='references' title='" . h($Jf) . "' id='refd$ed-" . ($t++) . "' style='left: $fd" . "em; top: " . $R["fields"][$If]["pos"] . "em; height: 1.25em; background: url(" . h(preg_replace("~\\?.*~", "", ME)) . "?file=arrow.gif) no-repeat right center;&amp;version=3.7.1'><div style='height: .5em; border-bottom: 1px solid Gray; width: " . (-$fd) . "em;'></div></div>";
            }
        }
        echo "\n</div>\n";
    }
    foreach ($df
             as $F => $R) {
        foreach ((array)$R["references"] as $Jf => $Pe) {
            foreach ($Pe
                     as $ed => $Ke) {
                $_d = $Wf;
                $sd = -10;
                foreach ($Ke[0] as $z => $mf) {
                    $ue = $R["pos"][0] + $R["fields"][$mf]["pos"];
                    $ve = $df[$Jf]["pos"][0] + $df[$Jf]["fields"][$Ke[1][$z]]["pos"];
                    $_d = min($_d, $ue, $ve);
                    $sd = max($sd, $ue, $ve);
                }
                echo "<div class='references' id='refl$ed' style='left: $ed" . "em; top: $_d" . "em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: " . ($sd - $_d) . "em;'></div></div>\n";
            }
        }
    }
    echo '</div>
<p><a href="', h(ME . "schema=" . urlencode($da)), '" id="schema-link">', lang(110), '</a>
';
} elseif (isset($_GET["dump"])) {
    $b = $_GET["dump"];
    if ($_POST && !$m) {
        $eb = "";
        foreach (array("output", "format", "db_style", "routines", "events", "table_style", "auto_increment", "triggers", "data_style") as $z) $eb .= "&$z=" . urlencode($_POST[$z]);
        cookie("adminer_export", substr($eb, 1));
        $Ff = array_flip((array)$_POST["tables"]) + array_flip((array)$_POST["data"]);
        $dc = dump_headers((count($Ff) == 1 ? key($Ff) : DB), (DB == "" || count($Ff) > 1));
        $Sc = ereg('sql', $_POST["format"]);
        if ($Sc) echo "-- Adminer $fa " . $Ab[DRIVER] . " dump

" . ($y != "sql" ? "" : "SET NAMES utf8;
" . ($_POST["data_style"] ? "SET foreign_key_checks = 0;
SET time_zone = " . q(substr(preg_replace('~^[^-]~', '+\0', $h->result("SELECT TIMEDIFF(NOW(), UTC_TIMESTAMP)")), 0, 6)) . ";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
" : "") . "
");
        $vf = $_POST["db_style"];
        $k = array(DB);
        if (DB == "") {
            $k = $_POST["databases"];
            if (is_string($k)) $k = explode("\n", rtrim(str_replace("\r", "", $k), "\n"));
        }
        foreach ((array)$k
                 as $l) {
            $c->dumpDatabase($l);
            if ($h->select_db($l)) {
                if ($Sc && ereg('CREATE', $vf) && ($j = $h->result("SHOW CREATE DATABASE " . idf_escape($l), 1))) {
                    if ($vf == "DROP+CREATE") echo "DROP DATABASE IF EXISTS " . idf_escape($l) . ";\n";
                    echo "$j;\n";
                }
                if ($Sc) {
                    if ($vf) echo
                        use_sql($l) . ";\n\n";
                    $ee = "";
                    if ($_POST["routines"]) {
                        foreach (array("FUNCTION", "PROCEDURE") as $Ye) {
                            foreach (get_rows("SHOW $Ye STATUS WHERE Db = " . q($l), null, "-- ") as $M) $ee .= ($vf != 'DROP+CREATE' ? "DROP $Ye IF EXISTS " . idf_escape($M["Name"]) . ";;\n" : "") . remove_definer($h->result("SHOW CREATE $Ye " . idf_escape($M["Name"]), 2)) . ";;\n\n";
                        }
                    }
                    if ($_POST["events"]) {
                        foreach (get_rows("SHOW EVENTS", null, "-- ") as $M) $ee .= ($vf != 'DROP+CREATE' ? "DROP EVENT IF EXISTS " . idf_escape($M["Name"]) . ";;\n" : "") . remove_definer($h->result("SHOW CREATE EVENT " . idf_escape($M["Name"]), 3)) . ";;\n\n";
                    }
                    if ($ee) echo "DELIMITER ;;\n\n$ee" . "DELIMITER ;\n\n";
                }
                if ($_POST["table_style"] || $_POST["data_style"]) {
                    $wg = array();
                    foreach (table_status('', true) as $F => $S) {
                        $R = (DB == "" || in_array($F, (array)$_POST["tables"]));
                        $kb = (DB == "" || in_array($F, (array)$_POST["data"]));
                        if ($R || $kb) {
                            if ($dc == "tar") {
                                $Uf = new
                                TmpFile;
                                ob_start(array($Uf, 'write'), 1e5);
                            }
                            $c->dumpTable($F, ($R ? $_POST["table_style"] : ""), (is_view($S) ? 2 : 0));
                            if (is_view($S)) $wg[] = $F; elseif ($kb) {
                                $o = fields($F);
                                $c->dumpData($F, $_POST["data_style"], "SELECT *" . convert_fields($o, $o) . " FROM " . table($F));
                            }
                            if ($Sc && $_POST["triggers"] && $R && ($dg = trigger_sql($F, $_POST["table_style"]))) echo "\nDELIMITER ;;\n$dg\nDELIMITER ;\n";
                            if ($dc == "tar") {
                                ob_end_flush();
                                tar_file((DB != "" ? "" : "$l/") . "$F.csv", $Uf);
                            } elseif ($Sc) echo "\n";
                        }
                    }
                    foreach ($wg
                             as $vg) $c->dumpTable($vg, $_POST["table_style"], 1);
                    if ($dc == "tar") echo
                    pack("x512");
                }
            }
        }
        if ($Sc) echo "-- " . $h->result("SELECT NOW()") . "\n";
        exit;
    }
    page_header(lang(111), $m, ($_GET["export"] != "" ? array("table" => $_GET["export"]) : array()), DB);
    echo '
<form action="" method="post">
<table cellspacing="0">
';
    $ob = array('', 'USE', 'DROP+CREATE', 'CREATE');
    $Ef = array('', 'DROP+CREATE', 'CREATE');
    $lb = array('', 'TRUNCATE+INSERT', 'INSERT');
    if ($y == "sql") $lb[] = 'INSERT+UPDATE';
    parse_str($_COOKIE["adminer_export"], $M);
    if (!$M) $M = array("output" => "text", "format" => "sql", "db_style" => (DB != "" ? "" : "CREATE"), "table_style" => "DROP+CREATE", "data_style" => "INSERT");
    if (!isset($M["events"])) {
        $M["routines"] = $M["events"] = ($_GET["dump"] == "");
        $M["triggers"] = $M["table_style"];
    }
    echo "<tr><th>" . lang(112) . "<td>" . html_select("output", $c->dumpOutput(), $M["output"], 0) . "\n";
    echo "<tr><th>" . lang(113) . "<td>" . html_select("format", $c->dumpFormat(), $M["format"], 0) . "\n";
    echo($y == "sqlite" ? "" : "<tr><th>" . lang(21) . "<td>" . html_select('db_style', $ob, $M["db_style"]) . (support("routine") ? checkbox("routines", 1, $M["routines"], lang(114)) : "") . (support("event") ? checkbox("events", 1, $M["events"], lang(115)) : "")), "<tr><th>" . lang(80) . "<td>" . html_select('table_style', $Ef, $M["table_style"]) . checkbox("auto_increment", 1, $M["auto_increment"], lang(92)) . (support("trigger") ? checkbox("triggers", 1, $M["triggers"], lang(108)) : ""), "<tr><th>" . lang(116) . "<td>" . html_select('data_style', $lb, $M["data_style"]), '</table>
<p><input type="submit" value="', lang(111), '">
<input type="hidden" name="token" value="', $T, '">

<table cellspacing="0">
';
    $ye = array();
    if (DB != "") {
        $Ka = ($b != "" ? "" : " checked");
        echo "<thead><tr>", "<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$Ka onclick='formCheck(this, /^tables\\[/);'>" . lang(80) . "</label>", "<th style='text-align: right;'><label class='block'>" . lang(116) . "<input type='checkbox' id='check-data'$Ka onclick='formCheck(this, /^data\\[/);'></label>", "</thead>\n";
        $wg = "";
        $Gf = tables_list();
        foreach ($Gf
                 as $F => $U) {
            $xe = ereg_replace("_.*", "", $F);
            $Ka = ($b == "" || $b == (substr($b, -1) == "%" ? "$xe%" : $F));
            $_e = "<tr><td>" . checkbox("tables[]", $F, $Ka, $F, "checkboxClick(event, this); formUncheck('check-tables');", "block");
            if ($U !== null && !eregi("table", $U)) $wg .= "$_e\n"; else
                echo "$_e<td align='right'><label class='block'><span id='Rows-" . h($F) . "'></span>" . checkbox("data[]", $F, $Ka, "", "checkboxClick(event, this); formUncheck('check-data');") . "</label>\n";
            $ye[$xe]++;
        }
        echo $wg;
        if ($Gf) echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=db');</script>\n";
    } else {
        echo "<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-databases'" . ($b == "" ? " checked" : "") . " onclick='formCheck(this, /^databases\\[/);'>" . lang(21) . "</label></thead>\n";
        $k = $c->databases();
        if ($k) {
            foreach ($k
                     as $l) {
                if (!information_schema($l)) {
                    $xe = ereg_replace("_.*", "", $l);
                    echo "<tr><td>" . checkbox("databases[]", $l, $b == "" || $b == "$xe%", $l, "formUncheck('check-databases');", "block") . "\n";
                    $ye[$xe]++;
                }
            }
        } else
            echo "<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";
    }
    echo '</table>
</form>
';
    $mc = true;
    foreach ($ye
             as $z => $X) {
        if ($z != "" && $X > 1) {
            echo ($mc ? "<p>" : " ") . "<a href='" . h(ME) . "dump=" . urlencode("$z%") . "'>" . h($z) . "</a>";
            $mc = false;
        }
    }
} elseif (isset($_GET["privileges"])) {
    page_header(lang(50));
    $K = $h->query("SELECT User, Host FROM mysql." . (DB == "" ? "user" : "db WHERE " . q(DB) . " LIKE Db") . " ORDER BY Host, User");
    $s = $K;
    if (!$K) $K = $h->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");
    echo "<form action=''><p>\n";
    hidden_fields_get();
    echo "<input type='hidden' name='db' value='" . h(DB) . "'>\n", ($s ? "" : "<input type='hidden' name='grant' value=''>\n"), "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(19) . "<th>" . lang(18) . "<th>&nbsp;</thead>\n";
    while ($M = $K->fetch_assoc()) echo '<tr' . odd() . '><td>' . h($M["User"]) . "<td>" . h($M["Host"]) . '<td><a href="' . h(ME . 'user=' . urlencode($M["User"]) . '&host=' . urlencode($M["Host"])) . '">' . lang(30) . "</a>\n";
    if (!$s || DB != "") echo "<tr" . odd() . "><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='" . lang(30) . "'>\n";
    echo "</table>\n", "</form>\n", '<p><a href="' . h(ME) . 'user=">' . lang(117) . "</a>";
} elseif (isset($_GET["sql"])) {
    if (!$m && $_POST["export"]) {
        dump_headers("sql");
        $c->dumpTable("", "");
        $c->dumpData("", "table", $_POST["query"]);
        exit;
    }
    restart_session();
    $Ec =& get_session("queries");
    $Dc =& $Ec[DB];
    if (!$m && $_POST["clear"]) {
        $Dc = array();
        redirect(remove_from_uri("history"));
    }
    page_header(lang(43), $m);
    if (!$m && $_POST) {
        $tc = false;
        $J = $_POST["query"];
        if ($_POST["webfile"]) {
            $tc = @fopen((file_exists("adminer.sql") ? "adminer.sql" : "compress.zlib://adminer.sql.gz"), "rb");
            $J = ($tc ? fread($tc, 1e6) : false);
        } elseif ($_FILES && $_FILES["sql_file"]["error"][0] != 4) $J = get_file("sql_file", true);
        if (is_string($J)) {
            if (function_exists('memory_get_usage')) @ini_set("memory_limit", max(ini_bytes("memory_limit"), 2 * strlen($J) + memory_get_usage() + 8e6));
            if ($J != "" && strlen($J) < 1e6) {
                $I = $J . (ereg(";[ \t\r\n]*\$", $J) ? "" : ";");
                if (!$Dc || reset(end($Dc)) != $I) {
                    restart_session();
                    $Dc[] = array($I, time());
                    set_session("queries", $Ec);
                    stop_session();
                }
            }
            $nf = "(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";
            $sb = ";";
            $Jd = 0;
            $Nb = true;
            $i = connect();
            if (is_object($i) && DB != "") $i->select_db(DB);
            $Wa = 0;
            $Tb = array();
            $kd = 0;
            $je = '[\'"' . ($y == "sql" ? '`#' : ($y == "sqlite" ? '`[' : ($y == "mssql" ? '[' : ''))) . ']|/\\*|-- |$' . ($y == "pgsql" ? '|\\$[^$]*\\$' : '');
            $Xf = microtime();
            parse_str($_COOKIE["adminer_export"], $ka);
            $Fb = $c->dumpFormat();
            unset($Fb["sql"]);
            while ($J != "") {
                if (!$Jd && preg_match("~^$nf*DELIMITER\\s+(\\S+)~i", $J, $C)) {
                    $sb = $C[1];
                    $J = substr($J, strlen($C[0]));
                } else {
                    preg_match('(' . preg_quote($sb) . "\\s*|$je)", $J, $C, PREG_OFFSET_CAPTURE, $Jd);
                    list($rc, $te) = $C[0];
                    if (!$rc && $tc && !feof($tc)) $J .= fread($tc, 1e5); else {
                        if (!$rc && rtrim($J) == "") break;
                        $Jd = $te + strlen($rc);
                        if ($rc && rtrim($rc) != $sb) {
                            while (preg_match('(' . ($rc == '/*' ? '\\*/' : ($rc == '[' ? ']' : (ereg('^-- |^#', $rc) ? "\n" : preg_quote($rc) . "|\\\\."))) . '|$)s', $J, $C, PREG_OFFSET_CAPTURE, $Jd)) {
                                $bf = $C[0][0];
                                if (!$bf && $tc && !feof($tc)) $J .= fread($tc, 1e5); else {
                                    $Jd = $C[0][1] + strlen($bf);
                                    if ($bf[0] != "\\") break;
                                }
                            }
                        } else {
                            $Nb = false;
                            $I = substr($J, 0, $te);
                            $Wa++;
                            $_e = "<pre id='sql-$Wa'><code class='jush-$y'>" . shorten_utf8(trim($I), 1000) . "</code></pre>\n";
                            if (!$_POST["only_errors"]) {
                                echo $_e;
                                ob_flush();
                                flush();
                            }
                            $pf = microtime();
                            if ($h->multi_query($I) && is_object($i) && preg_match("~^$nf*USE\\b~isU", $I)) $i->query($I);
                            do {
                                $K = $h->store_result();
                                $Ob = microtime();
                                $Of = " <span class='time'>(" . format_time($pf, $Ob) . ")</span>" . (strlen($I) < 1000 ? " <a href='" . h(ME) . "sql=" . urlencode(trim($I)) . "'>" . lang(30) . "</a>" : "");
                                if ($h->error) {
                                    echo($_POST["only_errors"] ? $_e : ""), "<p class='error'>" . lang(118) . ($h->errno ? " ($h->errno)" : "") . ": " . error() . "\n";
                                    $Tb[] = " <a href='#sql-$Wa'>$Wa</a>";
                                    if ($_POST["error_stops"]) break
                                    2;
                                } elseif (is_object($K)) {
                                    $ae = select($K, $i);
                                    if (!$_POST["only_errors"]) {
                                        echo "<form action='' method='post'>\n", "<p>" . ($K->num_rows ? lang(119, $K->num_rows) : "") . $Of;
                                        $u = "export-$Wa";
                                        $cc = ", <a href='#$u' onclick=\"return !toggle('$u');\">" . lang(111) . "</a><span id='$u' class='hidden'>: " . html_select("output", $c->dumpOutput(), $ka["output"]) . " " . html_select("format", $Fb, $ka["format"]) . "<input type='hidden' name='query' value='" . h($I) . "'>" . " <input type='submit' name='export' value='" . lang(111) . "'><input type='hidden' name='token' value='$T'></span>\n";
                                        if ($i && preg_match("~^($nf|\\()*SELECT\\b~isU", $I) && ($bc = explain($i, $I))) {
                                            $u = "explain-$Wa";
                                            echo ", <a href='#$u' onclick=\"return !toggle('$u');\">EXPLAIN</a>$cc", "<div id='$u' class='hidden'>\n";
                                            select($bc, $i, ($y == "sql" ? "http://dev.mysql.com/doc/refman/" . substr($h->server_info, 0, 3) . "/en/explain-output.html#explain_" : ""), $ae);
                                            echo "</div>\n";
                                        } else
                                            echo $cc;
                                        echo "</form>\n";
                                    }
                                } else {
                                    if (preg_match("~^$nf*(CREATE|DROP|ALTER)$nf+(DATABASE|SCHEMA)\\b~isU", $I)) {
                                        restart_session();
                                        set_session("dbs", null);
                                        stop_session();
                                    }
                                    if (!$_POST["only_errors"]) echo "<p class='message' title='" . h($h->info) . "'>" . lang(120, $h->affected_rows) . "$Of\n";
                                }
                                $pf = $Ob;
                            } while ($h->next_result());
                            $kd += substr_count($I . $rc, "\n");
                            $J = substr($J, $Jd);
                            $Jd = 0;
                        }
                    }
                }
            }
            if ($Nb) echo "<p class='message'>" . lang(121) . "\n"; elseif ($_POST["only_errors"]) {
                echo "<p class='message'>" . lang(122, $Wa - count($Tb)), " <span class='time'>(" . format_time($Xf, microtime()) . ")</span>\n";
            } elseif ($Tb && $Wa > 1) echo "<p class='error'>" . lang(118) . ": " . implode("", $Tb) . "\n";
        } else
            echo "<p class='error'>" . upload_error($J) . "\n";
    }
    echo '
<form action="" method="post" enctype="multipart/form-data" id="form">
<p>';
    $I = $_GET["sql"];
    if ($_POST) $I = $_POST["query"]; elseif ($_GET["history"] == "all") $I = $Dc;
    elseif ($_GET["history"] != "") $I = $Dc[$_GET["history"]][0];
    textarea("query", $I, 20);
    echo($_POST ? "" : "<script type='text/javascript'>focus(document.getElementsByTagName('textarea')[0]);</script>\n"), "<p>" . (ini_bool("file_uploads") ? lang(123) . ': <input type="file" name="sql_file[]" multiple' . ($_FILES && $_FILES["sql_file"]["error"][0] != 4 ? '' : ' onchange="this.form[\'only_errors\'].checked = true;"') . '> (&lt; ' . ini_get("upload_max_filesize") . 'B)' : lang(124)), '<p>
<input type="submit" value="', lang(29), '" title="Ctrl+Enter">
', checkbox("error_stops", 1, $_POST["error_stops"], lang(125)) . "\n", checkbox("only_errors", 1, $_POST["only_errors"], lang(126)) . "\n";
    print_fieldset("webfile", lang(127), $_POST["webfile"], "document.getElementById('form')['only_errors'].checked = true; ");
    echo
    lang(128, "<code>adminer.sql" . (extension_loaded("zlib") ? "[.gz]" : "") . "</code>"), ' <input type="submit" name="webfile" value="' . lang(129) . '">', "</div></fieldset>\n";
    if ($Dc) {
        print_fieldset("history", lang(130), $_GET["history"] != "");
        for ($X = end($Dc); $X; $X = prev($Dc)) {
            $z = key($Dc);
            list($I, $Of) = $X;
            echo '<a href="' . h(ME . "sql=&history=$z") . '">' . lang(30) . "</a> <span class='time' title='" . @date('Y-m-d', $Of) . "'>" . @date("H:i:s", $Of) . "</span> <code class='jush-$y'>" . shorten_utf8(ltrim(str_replace("\n", " ", str_replace("\r", "", preg_replace('~^(#|-- ).*~m', '', $I)))), 80, "</code>") . "<br>\n";
        }
        echo "<input type='submit' name='clear' value='" . lang(131) . "'>\n", "<a href='" . h(ME . "sql=&history=all") . "'>" . lang(132) . "</a>\n", "</div></fieldset>\n";
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["edit"])) {
    $b = $_GET["edit"];
    $o = fields($b);
    $Z = (isset($_GET["select"]) ? (count($_POST["check"]) == 1 ? where_check($_POST["check"][0], $o) : "") : where($_GET, $o));
    $og = (isset($_GET["select"]) ? $_POST["edit"] : $Z);
    foreach ($o
             as $F => $n) {
        if (!isset($n["privileges"][$og ? "update" : "insert"]) || $c->fieldName($n) == "") unset($o[$F]);
    }
    if ($_POST && !$m && !isset($_GET["select"])) {
        $B = $_POST["referer"];
        if ($_POST["insert"]) $B = ($og ? null : $_SERVER["REQUEST_URI"]); elseif (!ereg('^.+&select=.+$', $B)) $B = ME . "select=" . urlencode($b);
        $w = indexes($b);
        $jg = unique_array($_GET["where"], $w);
        $He = "\nWHERE $Z";
        if (isset($_POST["delete"])) {
            $J = "FROM " . table($b);
            query_redirect("DELETE" . ($jg ? " $J$He" : limit1($J, $He)), $B, lang(133));
        } else {
            $Q = array();
            foreach ($o
                     as $F => $n) {
                $X = process_input($n);
                if ($X !== false && $X !== null) $Q[idf_escape($F)] = ($og ? "\n" . idf_escape($F) . " = $X" : $X);
            }
            if ($og) {
                if (!$Q) redirect($B);
                $J = table($b) . " SET" . implode(",", $Q);
                query_redirect("UPDATE" . ($jg ? " $J$He" : limit1($J, $He)), $B, lang(134));
            } else {
                $K = insert_into($b, $Q);
                $dd = ($K ? last_id() : 0);
                queries_redirect($B, lang(135, ($dd ? " $dd" : "")), $K);
            }
        }
    }
    $Bf = $c->tableName(table_status1($b, true));
    page_header(($og ? lang(30) : lang(136)), $m, array("select" => array($b, $Bf)), $Bf);
    $M = null;
    if ($_POST["save"]) $M = (array)$_POST["fields"]; elseif ($Z) {
        $O = array();
        foreach ($o
                 as $F => $n) {
            if (isset($n["privileges"]["select"])) {
                $ta = convert_field($n);
                if ($_POST["clone"] && $n["auto_increment"]) $ta = "''";
                if ($y == "sql" && ereg("enum|set", $n["type"])) $ta = "1*" . idf_escape($F);
                $O[] = ($ta ? "$ta AS " : "") . idf_escape($F);
            }
        }
        $M = array();
        if ($O) {
            $N = get_rows("SELECT" . limit(implode(", ", $O) . " FROM " . table($b), " WHERE $Z", (isset($_GET["select"]) ? 2 : 1)));
            $M = (isset($_GET["select"]) && count($N) != 1 ? null : reset($N));
        }
    }
    if ($M === false) echo "<p class='error'>" . lang(82) . "\n";
    echo '
<form action="" method="post" enctype="multipart/form-data" id="form">
';
    if (!$o) echo "<p class='error'>" . lang(137) . "\n"; else {
        echo "<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";
        foreach ($o
                 as $F => $n) {
            echo "<tr><th>" . $c->fieldName($n);
            $rb = $_GET["set"][bracket_escape($F)];
            if ($rb === null) {
                $rb = $n["default"];
                if ($n["type"] == "bit" && ereg("^b'([01]*)'\$", $rb, $Qe)) $rb = $Qe[1];
            }
            $Y = ($M !== null ? ($M[$F] != "" && $y == "sql" && ereg("enum|set", $n["type"]) ? (is_array($M[$F]) ? array_sum($M[$F]) : +$M[$F]) : $M[$F]) : (!$og && $n["auto_increment"] ? "" : (isset($_GET["select"]) ? false : $rb)));
            if (!$_POST["save"] && is_string($Y)) $Y = $c->editVal($Y, $n);
            $r = ($_POST["save"] ? (string)$_POST["function"][$F] : ($og && $n["on_update"] == "CURRENT_TIMESTAMP" ? "now" : ($Y === false ? null : ($Y !== null ? '' : 'NULL'))));
            if (ereg("time", $n["type"]) && $Y == "CURRENT_TIMESTAMP") {
                $Y = "";
                $r = "now";
            }
            input($n, $Y, $r);
            echo "\n";
        }
        echo "</table>\n";
    }
    echo '<p>
';
    if ($o) {
        echo "<input type='submit' value='" . lang(138) . "'>\n";
        if (!isset($_GET["select"])) echo "<input type='submit' name='insert' value='" . ($og ? lang(139) : lang(140)) . "' title='Ctrl+Shift+Enter'>\n";
    }
    echo($og ? "<input type='submit' name='delete' value='" . lang(141) . "' onclick=\"return confirm('" . lang(0) . "');\">\n" : ($_POST || !$o ? "" : "<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));
    if (isset($_GET["select"])) hidden_fields(array("check" => (array)$_POST["check"], "clone" => $_POST["clone"], "all" => $_POST["all"]));
    echo '<input type="hidden" name="referer" value="', h(isset($_POST["referer"]) ? $_POST["referer"] : $_SERVER["HTTP_REFERER"]), '">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["create"])) {
    $b = $_GET["create"];
    $ke = array('HASH', 'LINEAR HASH', 'KEY', 'LINEAR KEY', 'RANGE', 'LIST');
    $Me = referencable_primary($b);
    $q = array();
    foreach ($Me
             as $Bf => $n) $q[str_replace("`", "``", $Bf) . "`" . str_replace("`", "``", $n["field"])] = $Bf;
    $de = array();
    $S = array();
    if ($b != "") {
        $de = fields($b);
        $S = table_status($b);
        if (!$S) $m = lang(7);
    }
    $M = $_POST;
    $M["fields"] = (array)$M["fields"];
    if ($M["auto_increment_col"]) $M["fields"][$M["auto_increment_col"]]["auto_increment"] = true;
    if ($_POST && !process_fields($M["fields"]) && !$m) {
        if ($_POST["drop"]) query_redirect("DROP TABLE " . table($b), substr(ME, 0, -1), lang(142)); else {
            $o = array();
            $qa = array();
            $qg = false;
            $oc = array();
            ksort($M["fields"]);
            $ce = reset($de);
            $oa = " FIRST";
            foreach ($M["fields"] as $z => $n) {
                $p = $q[$n["type"]];
                $eg = ($p !== null ? $Me[$p] : $n);
                if ($n["field"] != "") {
                    if (!$n["has_default"]) $n["default"] = null;
                    if ($z == $M["auto_increment_col"]) $n["auto_increment"] = true;
                    $Ee = process_field($n, $eg);
                    $qa[] = array($n["orig"], $Ee, $oa);
                    if ($Ee != process_field($ce, $ce)) {
                        $o[] = array($n["orig"], $Ee, $oa);
                        if ($n["orig"] != "" || $oa) $qg = true;
                    }
                    if ($p !== null) $oc[idf_escape($n["field"])] = ($b != "" && $y != "sqlite" ? "ADD" : " ") . " FOREIGN KEY (" . idf_escape($n["field"]) . ") REFERENCES " . table($q[$n["type"]]) . " (" . idf_escape($eg["field"]) . ")" . (ereg("^($Qd)\$", $n["on_delete"]) ? " ON DELETE $n[on_delete]" : "");
                    $oa = " AFTER " . idf_escape($n["field"]);
                } elseif ($n["orig"] != "") {
                    $qg = true;
                    $o[] = array($n["orig"]);
                }
                if ($n["orig"] != "") {
                    $ce = next($de);
                    if (!$ce) $oa = "";
                }
            }
            $me = "";
            if (in_array($M["partition_by"], $ke)) {
                $ne = array();
                if ($M["partition_by"] == 'RANGE' || $M["partition_by"] == 'LIST') {
                    foreach (array_filter($M["partition_names"]) as $z => $X) {
                        $Y = $M["partition_values"][$z];
                        $ne[] = "\n  PARTITION " . idf_escape($X) . " VALUES " . ($M["partition_by"] == 'RANGE' ? "LESS THAN" : "IN") . ($Y != "" ? " ($Y)" : " MAXVALUE");
                    }
                }
                $me .= "\nPARTITION BY $M[partition_by]($M[partition])" . ($ne ? " (" . implode(",", $ne) . "\n)" : ($M["partitions"] ? " PARTITIONS " . (+$M["partitions"]) : ""));
            } elseif (support("partitioning") && ereg("partitioned", $S["Create_options"])) $me .= "\nREMOVE PARTITIONING";
            $D = lang(143);
            if ($b == "") {
                cookie("adminer_engine", $M["Engine"]);
                $D = lang(144);
            }
            $F = trim($M["name"]);
            queries_redirect(ME . "table=" . urlencode($F), $D, alter_table($b, $F, ($y == "sqlite" && ($qg || $oc) ? $qa : $o), $oc, $M["Comment"], ($M["Engine"] && $M["Engine"] != $S["Engine"] ? $M["Engine"] : ""), ($M["Collation"] && $M["Collation"] != $S["Collation"] ? $M["Collation"] : ""), ($M["Auto_increment"] != "" ? +$M["Auto_increment"] : ""), $me));
        }
    }
    page_header(($b != "" ? lang(27) : lang(145)), $m, array("table" => $b), $b);
    if (!$_POST) {
        $M = array("Engine" => $_COOKIE["adminer_engine"], "fields" => array(array("field" => "", "type" => (isset($gg["int"]) ? "int" : (isset($gg["integer"]) ? "integer" : "")))), "partition_names" => array(""),);
        if ($b != "") {
            $M = $S;
            $M["name"] = $b;
            $M["fields"] = array();
            if (!$_GET["auto_increment"]) $M["Auto_increment"] = "";
            foreach ($de
                     as $n) {
                $n["has_default"] = isset($n["default"]);
                $M["fields"][] = $n;
            }
            if (support("partitioning")) {
                $uc = "FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = " . q(DB) . " AND TABLE_NAME = " . q($b);
                $K = $h->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $uc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");
                list($M["partition_by"], $M["partitions"], $M["partition"]) = $K->fetch_row();
                $ne = get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $uc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");
                $ne[""] = "";
                $M["partition_names"] = array_keys($ne);
                $M["partition_values"] = array_values($ne);
            }
        }
    }
    $Ta = collations();
    $Qb = engines();
    foreach ($Qb
             as $Pb) {
        if (!strcasecmp($Pb, $M["Engine"])) {
            $M["Engine"] = $Pb;
            break;
        }
    }
    echo '
<form action="" method="post" id="form">
<p>
', lang(146), ': <input name="name" maxlength="64" value="', h($M["name"]), '" autocapitalize="off">
';
    if ($b == "" && !$_POST) {
        ?>
        <script type='text/javascript'>focus(document.getElementById('form')['name']);</script><?php
    }
    echo($Qb ? html_select("Engine", array("" => "(" . lang(147) . ")") + $Qb, $M["Engine"]) : ""), ' ', ($Ta && !ereg("sqlite|mssql", $y) ? html_select("Collation", array("" => "(" . lang(84) . ")") + $Ta, $M["Collation"]) : ""), ' <input type="submit" value="', lang(138), '">
<table cellspacing="0" id="edit-fields" class="nowrap">
';
    $Ya = ($_POST ? $_POST["comments"] : $M["Comment"] != "");
    if (!$_POST && !$Ya) {
        foreach ($M["fields"] as $n) {
            if ($n["comment"] != "") {
                $Ya = true;
                break;
            }
        }
    }
    edit_fields($M["fields"], $Ta, "TABLE", $q, $Ya);
    echo '</table>
<p>
', lang(92), ': <input type="number" name="Auto_increment" size="6" value="', h($M["Auto_increment"]), '">
', checkbox("defaults", 1, true, lang(93), "columnShow(this.checked, 5)", "jsonly");
    if (!$_POST["defaults"]) {
        echo '<script type="text/javascript">editingHideDefaults()</script>';
    }
    echo(support("comment") ? "<label><input type='checkbox' name='comments' value='1' class='jsonly' onclick=\"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();\"" . ($Ya ? " checked" : "") . ">" . lang(94) . "</label>" . ' <input name="Comment" id="Comment" value="' . h($M["Comment"]) . '" maxlength="' . ($h->server_info >= 5.5 ? 2048 : 60) . '"' . ($Ya ? '' : ' class="hidden"') . '>' : ''), '<p>
<input type="submit" value="', lang(138), '">
';
    if ($_GET["create"] != "") {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    if (support("partitioning")) {
        $le = ereg('RANGE|LIST', $M["partition_by"]);
        print_fieldset("partition", lang(148), $M["partition_by"]);
        echo '<p>
', html_select("partition_by", array(-1 => "") + $ke, $M["partition_by"], "partitionByChange(this);"), '(<input name="partition" value="', h($M["partition"]), '">)
', lang(149), ': <input type="number" name="partitions" class="size" value="', h($M["partitions"]), '"', ($le || !$M["partition_by"] ? " class='hidden'" : ""), '>
<table cellspacing="0" id="partition-table"', ($le ? "" : " class='hidden'"), '>
<thead><tr><th>', lang(150), '<th>', lang(151), '</thead>
';
        foreach ($M["partition_names"] as $z => $X) {
            echo '<tr>', '<td><input name="partition_names[]" value="' . h($X) . '"' . ($z == count($M["partition_names"]) - 1 ? ' onchange="partitionNameChange(this);"' : '') . ' autocapitalize="off">', '<td><input name="partition_values[]" value="' . h($M["partition_values"][$z]) . '">';
        }
        echo '</table>
</div></fieldset>
';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["indexes"])) {
    $b = $_GET["indexes"];
    $Lc = array("PRIMARY", "UNIQUE", "INDEX");
    $S = table_status($b, true);
    if (eregi("MyISAM|M?aria" . ($h->server_info >= 5.6 ? "|InnoDB" : ""), $S["Engine"])) $Lc[] = "FULLTEXT";
    $w = indexes($b);
    if ($y == "sqlite") {
        unset($Lc[0]);
        unset($w[""]);
    }
    $M = $_POST;
    if ($_POST && !$m && !$_POST["add"]) {
        $ra = array();
        foreach ($M["indexes"] as $v) {
            $F = $v["name"];
            if (in_array($v["type"], $Lc)) {
                $f = array();
                $jd = array();
                $ub = array();
                $Q = array();
                ksort($v["columns"]);
                foreach ($v["columns"] as $z => $e) {
                    if ($e != "") {
                        $id = $v["lengths"][$z];
                        $tb = $v["descs"][$z];
                        $Q[] = idf_escape($e) . ($id ? "(" . (+$id) . ")" : "") . ($tb ? " DESC" : "");
                        $f[] = $e;
                        $jd[] = ($id ? $id : null);
                        $ub[] = $tb;
                    }
                }
                if ($f) {
                    $ac = $w[$F];
                    if ($ac) {
                        ksort($ac["columns"]);
                        ksort($ac["lengths"]);
                        ksort($ac["descs"]);
                        if ($v["type"] == $ac["type"] && array_values($ac["columns"]) === $f && (!$ac["lengths"] || array_values($ac["lengths"]) === $jd) && array_values($ac["descs"]) === $ub) {
                            unset($w[$F]);
                            continue;
                        }
                    }
                    $ra[] = array($v["type"], $F, "(" . implode(", ", $Q) . ")");
                }
            }
        }
        foreach ($w
                 as $F => $ac) $ra[] = array($ac["type"], $F, "DROP");
        if (!$ra) redirect(ME . "table=" . urlencode($b));
        queries_redirect(ME . "table=" . urlencode($b), lang(152), alter_indexes($b, $ra));
    }
    page_header(lang(102), $m, array("table" => $b), $b);
    $o = array_keys(fields($b));
    if ($_POST["add"]) {
        foreach ($M["indexes"] as $z => $v) {
            if ($v["columns"][count($v["columns"])] != "") $M["indexes"][$z]["columns"][] = "";
        }
        $v = end($M["indexes"]);
        if ($v["type"] || array_filter($v["columns"], 'strlen') || array_filter($v["lengths"], 'strlen') || array_filter($v["descs"])) $M["indexes"][] = array("columns" => array(1 => ""));
    }
    if (!$M) {
        foreach ($w
                 as $z => $v) {
            $w[$z]["name"] = $z;
            $w[$z]["columns"][] = "";
        }
        $w[] = array("columns" => array(1 => ""));
        $M["indexes"] = $w;
    }
    echo '
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>', lang(153), '<th>', lang(154), '<th>', lang(155), '</thead>
';
    $x = 1;
    foreach ($M["indexes"] as $v) {
        echo "<tr><td>" . html_select("indexes[$x][type]", array(-1 => "") + $Lc, $v["type"], ($x == count($M["indexes"]) ? "indexesAddRow(this);" : 1)) . "<td>";
        ksort($v["columns"]);
        $t = 1;
        foreach ($v["columns"] as $z => $e) {
            echo "<span>" . html_select("indexes[$x][columns][$t]", array(-1 => "") + $o, $e, ($t == count($v["columns"]) ? "indexesAddColumn" : "indexesChangeColumn") . "(this, '" . js_escape($y == "sql" ? "" : $_GET["indexes"] . "_") . "');"), ($y == "sql" || $y == "mssql" ? "<input type='number' name='indexes[$x][lengths][$t]' class='size' value='" . h($v["lengths"][$z]) . "'>" : ""), ($y != "sql" ? checkbox("indexes[$x][descs][$t]", 1, $v["descs"][$z], lang(38)) : ""), " </span>";
            $t++;
        }
        echo "<td><input name='indexes[$x][name]' value='" . h($v["name"]) . "' autocapitalize='off'>\n";
        $x++;
    }
    echo '</table>
<p>
<input type="submit" value="', lang(138), '">
<noscript><p><input type="submit" name="add" value="', lang(95), '"></noscript>
<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["database"])) {
    $M = $_POST;
    if ($_POST && !$m && !isset($_POST["add_x"])) {
        restart_session();
        $F = trim($M["name"]);
        if ($_POST["drop"]) {
            $_GET["db"] = "";
            queries_redirect(remove_from_uri("db|database"), lang(156), drop_databases(array(DB)));
        } elseif (DB !== $F) {
            if (DB != "") {
                $_GET["db"] = $F;
                queries_redirect(preg_replace('~db=[^&]*&~', '', ME) . "db=" . urlencode($F), lang(157), rename_database($F, $M["collation"]));
            } else {
                $k = explode("\n", str_replace("\r", "", $F));
                $wf = true;
                $cd = "";
                foreach ($k
                         as $l) {
                    if (count($k) == 1 || $l != "") {
                        if (!create_database($l, $M["collation"])) $wf = false;
                        $cd = $l;
                    }
                }
                queries_redirect(ME . "db=" . urlencode($cd), lang(158), $wf);
            }
        } else {
            if (!$M["collation"]) redirect(substr(ME, 0, -1));
            query_redirect("ALTER DATABASE " . idf_escape($F) . (eregi('^[a-z0-9_]+$', $M["collation"]) ? " COLLATE $M[collation]" : ""), substr(ME, 0, -1), lang(159));
        }
    }
    page_header(DB != "" ? lang(46) : lang(160), $m, array(), DB);
    $Ta = collations();
    $F = DB;
    if ($_POST) $F = $M["name"]; elseif (DB != "") $M["collation"] = db_collation(DB, $Ta);
    elseif ($y == "sql") {
        foreach (get_vals("SHOW GRANTS") as $s) {
            if (preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~', $s, $C) && $C[1]) {
                $F = stripcslashes(idf_unescape("`$C[2]`"));
                break;
            }
        }
    }
    echo '
<form action="" method="post">
<p>
', ($_POST["add_x"] || strpos($F, "\n") ? '<textarea id="name" name="name" rows="10" cols="40">' . h($F) . '</textarea><br>' : '<input name="name" id="name" value="' . h($F) . '" maxlength="64" autocapitalize="off">') . "\n" . ($Ta ? html_select("collation", array("" => "(" . lang(84) . ")") + $Ta, $M["collation"]) : "");?>
    <script type='text/javascript'>focus(document.getElementById('name'));</script>
    <input type="submit" value="<?php echo
    lang(138), '">
';
    if (DB != "") echo "<input type='submit' name='drop' value='" . lang(81) . "'" . confirm() . ">\n"; elseif (!$_POST["add_x"] && $_GET["db"] == "") echo "<input type='image' name='add' src='" . h(preg_replace("~\\?.*~", "", ME)) . "?file=plus.gif&amp;version=3.7.1' alt='+' title='" . lang(95) . "'>\n";
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["call"])) {
    $ca = $_GET["call"];
    page_header(lang(161) . ": " . h($ca), $m);
    $Ye = routine($ca, (isset($_GET["callf"]) ? "FUNCTION" : "PROCEDURE"));
    $Kc = array();
    $ee = array();
    foreach ($Ye["fields"] as $t => $n) {
        if (substr($n["inout"], -3) == "OUT") $ee[$t] = "@" . idf_escape($n["field"]) . " AS " . idf_escape($n["field"]);
        if (!$n["inout"] || substr($n["inout"], 0, 2) == "IN") $Kc[] = $t;
    }
    if (!$m && $_POST) {
        $Ha = array();
        foreach ($Ye["fields"] as $z => $n) {
            if (in_array($z, $Kc)) {
                $X = process_input($n);
                if ($X === false) $X = "''";
                if (isset($ee[$z])) $h->query("SET @" . idf_escape($n["field"]) . " = $X");
            }
            $Ha[] = (isset($ee[$z]) ? "@" . idf_escape($n["field"]) : $X);
        }
        $J = (isset($_GET["callf"]) ? "SELECT" : "CALL") . " " . idf_escape($ca) . "(" . implode(", ", $Ha) . ")";
        echo "<p><code class='jush-$y'>" . h($J) . "</code> <a href='" . h(ME) . "sql=" . urlencode($J) . "'>" . lang(30) . "</a>\n";
        if (!$h->multi_query($J)) echo "<p class='error'>" . error() . "\n"; else {
            $i = connect();
            if (is_object($i)) $i->select_db(DB);
            do {
                $K = $h->store_result();
                if (is_object($K)) select($K, $i); else
                    echo "<p class='message'>" . lang(162, $h->affected_rows) . "\n";
            } while ($h->next_result());
            if ($ee) select($h->query("SELECT " . implode(", ", $ee)));
        }
    }
    echo '
<form action="" method="post">
';
    if ($Kc) {
        echo "<table cellspacing='0'>\n";
        foreach ($Kc
                 as $z) {
            $n = $Ye["fields"][$z];
            $F = $n["field"];
            echo "<tr><th>" . $c->fieldName($n);
            $Y = $_POST["fields"][$F];
            if ($Y != "") {
                if ($n["type"] == "enum") $Y = +$Y;
                if ($n["type"] == "set") $Y = array_sum($Y);
            }
            input($n, $Y, (string)$_POST["function"][$F]);
            echo "\n";
        }
        echo "</table>\n";
    }
    echo '<p>
<input type="submit" value="', lang(161), '">
<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["foreign"])) {
    $b = $_GET["foreign"];
    $F = $_GET["name"];
    $M = $_POST;
    if ($_POST && !$m && !$_POST["add"] && !$_POST["change"] && !$_POST["change-js"]) {
        if ($_POST["drop"]) query_redirect("ALTER TABLE " . table($b) . "\nDROP " . ($y == "sql" ? "FOREIGN KEY " : "CONSTRAINT ") . idf_escape($F), ME . "table=" . urlencode($b), lang(163)); else {
            $mf = array_filter($M["source"], 'strlen');
            ksort($mf);
            $If = array();
            foreach ($mf
                     as $z => $X) $If[$z] = $M["target"][$z];
            query_redirect("ALTER TABLE " . table($b) . ($F != "" ? "\nDROP " . ($y == "sql" ? "FOREIGN KEY " : "CONSTRAINT ") . idf_escape($F) . "," : "") . "\nADD FOREIGN KEY (" . implode(", ", array_map('idf_escape', $mf)) . ") REFERENCES " . table($M["table"]) . " (" . implode(", ", array_map('idf_escape', $If)) . ")" . (ereg("^($Qd)\$", $M["on_delete"]) ? " ON DELETE $M[on_delete]" : "") . (ereg("^($Qd)\$", $M["on_update"]) ? " ON UPDATE $M[on_update]" : ""), ME . "table=" . urlencode($b), ($F != "" ? lang(164) : lang(165)));
            $m = lang(166) . "<br>$m";
        }
    }
    page_header(lang(167), $m, array("table" => $b), $b);
    if ($_POST) {
        ksort($M["source"]);
        if ($_POST["add"]) $M["source"][] = ""; elseif ($_POST["change"] || $_POST["change-js"]) $M["target"] = array();
    } elseif ($F != "") {
        $q = foreign_keys($b);
        $M = $q[$F];
        $M["source"][] = "";
    } else {
        $M["table"] = $b;
        $M["source"] = array("");
    }
    $mf = array_keys(fields($b));
    $If = ($b === $M["table"] ? $mf : array_keys(fields($M["table"])));
    $Le = array_keys(array_filter(table_status('', true), 'fk_support'));
    echo '
<form action="" method="post">
<p>
';
    if ($M["db"] == "" && $M["ns"] == "") {
        echo
        lang(168), ':
', html_select("table", $Le, $M["table"], "this.form['change-js'].value = '1'; this.form.submit();"), '<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="', lang(169), '"></noscript>
<table cellspacing="0">
<thead><tr><th>', lang(104), '<th>', lang(105), '</thead>
';
        $x = 0;
        foreach ($M["source"] as $z => $X) {
            echo "<tr>", "<td>" . html_select("source[" . (+$z) . "]", array(-1 => "") + $mf, $X, ($x == count($M["source"]) - 1 ? "foreignAddRow(this);" : 1)), "<td>" . html_select("target[" . (+$z) . "]", $If, $M["target"][$z]);
            $x++;
        }
        echo '</table>
<p>
', lang(86), ': ', html_select("on_delete", array(-1 => "") + explode("|", $Qd), $M["on_delete"]), ' ', lang(85), ': ', html_select("on_update", array(-1 => "") + explode("|", $Qd), $M["on_update"]), '<p>
<input type="submit" value="', lang(138), '">
<noscript><p><input type="submit" name="add" value="', lang(170), '"></noscript>
';
    }
    if ($F != "") {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["view"])) {
    $b = $_GET["view"];
    $M = $_POST;
    if ($_POST && !$m) {
        $F = trim($M["name"]);
        $ta = " AS\n$M[select]";
        $B = ME . "table=" . urlencode($F);
        $D = lang(171);
        if (!$_POST["drop"] && $b == $F && $y != "sqlite") query_redirect(($y == "mssql" ? "ALTER" : "CREATE OR REPLACE") . " VIEW " . table($F) . $ta, $B, $D); else {
            $Kf = $F . "_adminer_" . uniqid();
            drop_create("DROP VIEW " . table($b), "CREATE VIEW " . table($F) . $ta, "DROP VIEW " . table($F), "CREATE VIEW " . table($Kf) . $ta, "DROP VIEW " . table($Kf), ($_POST["drop"] ? substr(ME, 0, -1) : $B), lang(172), $D, lang(173), $b, $F);
        }
    }
    if (!$_POST && $b != "") {
        $M = view($b);
        $M["name"] = $b;
        if (!$m) $m = $h->error;
    }
    page_header(($b != "" ? lang(26) : lang(174)), $m, array("table" => $b), $b);
    echo '
<form action="" method="post">
<p>', lang(155), ': <input name="name" value="', h($M["name"]), '" maxlength="64" autocapitalize="off">
<p>';
    textarea("select", $M["select"]);
    echo '<p>
<input type="submit" value="', lang(138), '">
';
    if ($_GET["view"] != "") {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["event"])) {
    $aa = $_GET["event"];
    $Qc = array("YEAR", "QUARTER", "MONTH", "DAY", "HOUR", "MINUTE", "WEEK", "SECOND", "YEAR_MONTH", "DAY_HOUR", "DAY_MINUTE", "DAY_SECOND", "HOUR_MINUTE", "HOUR_SECOND", "MINUTE_SECOND");
    $rf = array("ENABLED" => "ENABLE", "DISABLED" => "DISABLE", "SLAVESIDE_DISABLED" => "DISABLE ON SLAVE");
    $M = $_POST;
    if ($_POST && !$m) {
        if ($_POST["drop"]) query_redirect("DROP EVENT " . idf_escape($aa), substr(ME, 0, -1), lang(175)); elseif (in_array($M["INTERVAL_FIELD"], $Qc) && isset($rf[$M["STATUS"]])) {
            $cf = "\nON SCHEDULE " . ($M["INTERVAL_VALUE"] ? "EVERY " . q($M["INTERVAL_VALUE"]) . " $M[INTERVAL_FIELD]" . ($M["STARTS"] ? " STARTS " . q($M["STARTS"]) : "") . ($M["ENDS"] ? " ENDS " . q($M["ENDS"]) : "") : "AT " . q($M["STARTS"])) . " ON COMPLETION" . ($M["ON_COMPLETION"] ? "" : " NOT") . " PRESERVE";
            queries_redirect(substr(ME, 0, -1), ($aa != "" ? lang(176) : lang(177)), queries(($aa != "" ? "ALTER EVENT " . idf_escape($aa) . $cf . ($aa != $M["EVENT_NAME"] ? "\nRENAME TO " . idf_escape($M["EVENT_NAME"]) : "") : "CREATE EVENT " . idf_escape($M["EVENT_NAME"]) . $cf) . "\n" . $rf[$M["STATUS"]] . " COMMENT " . q($M["EVENT_COMMENT"]) . rtrim(" DO\n$M[EVENT_DEFINITION]", ";") . ";"));
        }
    }
    page_header(($aa != "" ? lang(178) . ": " . h($aa) : lang(179)), $m);
    if (!$M && $aa != "") {
        $N = get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = " . q(DB) . " AND EVENT_NAME = " . q($aa));
        $M = reset($N);
    }
    echo '
<form action="" method="post">
<table cellspacing="0">
<tr><th>', lang(155), '<td><input name="EVENT_NAME" value="', h($M["EVENT_NAME"]), '" maxlength="64" autocapitalize="off">
<tr><th title="datetime">', lang(180), '<td><input name="STARTS" value="', h("$M[EXECUTE_AT]$M[STARTS]"), '">
<tr><th title="datetime">', lang(181), '<td><input name="ENDS" value="', h($M["ENDS"]), '">
<tr><th>', lang(182), '<td><input type="number" name="INTERVAL_VALUE" value="', h($M["INTERVAL_VALUE"]), '" class="size"> ', html_select("INTERVAL_FIELD", $Qc, $M["INTERVAL_FIELD"]), '<tr><th>', lang(75), '<td>', html_select("STATUS", $rf, $M["STATUS"]), '<tr><th>', lang(94), '<td><input name="EVENT_COMMENT" value="', h($M["EVENT_COMMENT"]), '" maxlength="64">
<tr><th>&nbsp;<td>', checkbox("ON_COMPLETION", "PRESERVE", $M["ON_COMPLETION"] == "PRESERVE", lang(183)), '</table>
<p>';
    textarea("EVENT_DEFINITION", $M["EVENT_DEFINITION"]);
    echo '<p>
<input type="submit" value="', lang(138), '">
';
    if ($aa != "") {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["procedure"])) {
    $ca = $_GET["procedure"];
    $Ye = (isset($_GET["function"]) ? "FUNCTION" : "PROCEDURE");
    $M = $_POST;
    $M["fields"] = (array)$M["fields"];
    if ($_POST && !process_fields($M["fields"]) && !$m) {
        $Kf = "$M[name]_adminer_" . uniqid();
        drop_create("DROP $Ye " . idf_escape($ca), create_routine($Ye, $M), "DROP $Ye " . idf_escape($M["name"]), create_routine($Ye, array("name" => $Kf) + $M), "DROP $Ye " . idf_escape($Kf), substr(ME, 0, -1), lang(184), lang(185), lang(186), $ca, $M["name"]);
    }
    page_header(($ca != "" ? (isset($_GET["function"]) ? lang(187) : lang(188)) . ": " . h($ca) : (isset($_GET["function"]) ? lang(189) : lang(190))), $m);
    if (!$_POST && $ca != "") {
        $M = routine($ca, $Ye);
        $M["name"] = $ca;
    }
    $Ta = get_vals("SHOW CHARACTER SET");
    sort($Ta);
    $Ze = routine_languages();
    echo '
<form action="" method="post" id="form">
<p>', lang(155), ': <input name="name" value="', h($M["name"]), '" maxlength="64" autocapitalize="off">
', ($Ze ? lang(9) . ": " . html_select("language", $Ze, $M["language"]) : ""), '<table cellspacing="0" class="nowrap">
';
    edit_fields($M["fields"], $Ta, $Ye);
    if (isset($_GET["function"])) {
        echo "<tr><td>" . lang(191);
        edit_type("returns", $M["returns"], $Ta);
    }
    echo '</table>
<p>';
    textarea("definition", $M["definition"]);
    echo '<p>
<input type="submit" value="', lang(138), '">
';
    if ($ca != "") {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["trigger"])) {
    $b = $_GET["trigger"];
    $F = $_GET["name"];
    $cg = trigger_options();
    $bg = array("INSERT", "UPDATE", "DELETE");
    $M = (array)trigger($F) + array("Trigger" => $b . "_bi");
    if ($_POST) {
        if (!$m && in_array($_POST["Timing"], $cg["Timing"]) && in_array($_POST["Event"], $bg) && in_array($_POST["Type"], $cg["Type"])) {
            $Pd = " ON " . table($b);
            $Bb = "DROP TRIGGER " . idf_escape($F) . ($y == "pgsql" ? $Pd : "");
            $B = ME . "table=" . urlencode($b);
            if ($_POST["drop"]) query_redirect($Bb, $B, lang(192)); else {
                if ($F != "") queries($Bb);
                queries_redirect($B, ($F != "" ? lang(193) : lang(194)), queries(create_trigger($Pd, $_POST)));
                if ($F != "") queries(create_trigger($Pd, $M + array("Type" => reset($cg["Type"]))));
            }
        }
        $M = $_POST;
    }
    page_header(($F != "" ? lang(195) . ": " . h($F) : lang(196)), $m, array("table" => $b));
    echo '
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>', lang(197), '<td>', html_select("Timing", $cg["Timing"], $M["Timing"], "if (/^" . preg_quote($b, "/") . "_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '" . js_escape($b) . "_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"), '<tr><th>', lang(198), '<td>', html_select("Event", $bg, $M["Event"], "this.form['Timing'].onchange();"), '<tr><th>', lang(89), '<td>', html_select("Type", $cg["Type"], $M["Type"]), '</table>
<p>', lang(155), ': <input name="Trigger" value="', h($M["Trigger"]), '" maxlength="64" autocapitalize="off">
<p>';
    textarea("Statement", $M["Statement"]);
    echo '<p>
<input type="submit" value="', lang(138), '">
';
    if ($F != "") {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["user"])) {
    $ea = $_GET["user"];
    $Ce = array("" => array("All privileges" => ""));
    foreach (get_rows("SHOW PRIVILEGES") as $M) {
        foreach (explode(",", ($M["Privilege"] == "Grant option" ? "" : $M["Context"])) as $db) $Ce[$db][$M["Privilege"]] = $M["Comment"];
    }
    $Ce["Server Admin"] += $Ce["File access on server"];
    $Ce["Databases"]["Create routine"] = $Ce["Procedures"]["Create routine"];
    unset($Ce["Procedures"]["Create routine"]);
    $Ce["Columns"] = array();
    foreach (array("Select", "Insert", "Update", "References") as $X) $Ce["Columns"][$X] = $Ce["Tables"][$X];
    unset($Ce["Server Admin"]["Usage"]);
    foreach ($Ce["Tables"] as $z => $X) unset($Ce["Databases"][$z]);
    $Ed = array();
    if ($_POST) {
        foreach ($_POST["objects"] as $z => $X) $Ed[$X] = (array)$Ed[$X] + (array)$_POST["grants"][$z];
    }
    $yc = array();
    $Nd = "";
    if (isset($_GET["host"]) && ($K = $h->query("SHOW GRANTS FOR " . q($ea) . "@" . q($_GET["host"])))) {
        while ($M = $K->fetch_row()) {
            if (preg_match('~GRANT (.*) ON (.*) TO ~', $M[0], $C) && preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~', $C[1], $od, PREG_SET_ORDER)) {
                foreach ($od
                         as $X) {
                    if ($X[1] != "USAGE") $yc["$C[2]$X[2]"][$X[1]] = true;
                    if (ereg(' WITH GRANT OPTION', $M[0])) $yc["$C[2]$X[2]"]["GRANT OPTION"] = true;
                }
            }
            if (preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~", $M[0], $C)) $Nd = $C[1];
        }
    }
    if ($_POST && !$m) {
        $Od = (isset($_GET["host"]) ? q($ea) . "@" . q($_GET["host"]) : "''");
        if ($_POST["drop"]) query_redirect("DROP USER $Od", ME . "privileges=", lang(199)); else {
            $Gd = q($_POST["user"]) . "@" . q($_POST["host"]);
            $oe = $_POST["pass"];
            if ($oe != '' && !$_POST["hashed"]) {
                $oe = $h->result("SELECT PASSWORD(" . q($oe) . ")");
                $m = !$oe;
            }
            $hb = false;
            if (!$m) {
                if ($Od != $Gd) {
                    $hb = queries(($h->server_info < 5 ? "GRANT USAGE ON *.* TO" : "CREATE USER") . " $Gd IDENTIFIED BY PASSWORD " . q($oe));
                    $m = !$hb;
                } elseif ($oe != $Nd) queries("SET PASSWORD FOR $Gd = " . q($oe));
            }
            if (!$m) {
                $Ve = array();
                foreach ($Ed
                         as $Id => $s) {
                    if (isset($_GET["grant"])) $s = array_filter($s);
                    $s = array_keys($s);
                    if (isset($_GET["grant"])) $Ve = array_diff(array_keys(array_filter($Ed[$Id], 'strlen')), $s); elseif ($Od == $Gd) {
                        $Ld = array_keys((array)$yc[$Id]);
                        $Ve = array_diff($Ld, $s);
                        $s = array_diff($s, $Ld);
                        unset($yc[$Id]);
                    }
                    if (preg_match('~^(.+)\\s*(\\(.*\\))?$~U', $Id, $C) && (!grant("REVOKE", $Ve, $C[2], " ON $C[1] FROM $Gd") || !grant("GRANT", $s, $C[2], " ON $C[1] TO $Gd"))) {
                        $m = true;
                        break;
                    }
                }
            }
            if (!$m && isset($_GET["host"])) {
                if ($Od != $Gd) queries("DROP USER $Od"); elseif (!isset($_GET["grant"])) {
                    foreach ($yc
                             as $Id => $Ve) {
                        if (preg_match('~^(.+)(\\(.*\\))?$~U', $Id, $C)) grant("REVOKE", array_keys($Ve), $C[2], " ON $C[1] FROM $Gd");
                    }
                }
            }
            queries_redirect(ME . "privileges=", (isset($_GET["host"]) ? lang(200) : lang(201)), !$m);
            if ($hb) $h->query("DROP USER $Gd");
        }
    }
    page_header((isset($_GET["host"]) ? lang(19) . ": " . h("$ea@$_GET[host]") : lang(117)), $m, array("privileges" => array('', lang(50))));
    if ($_POST) {
        $M = $_POST;
        $yc = $Ed;
    } else {
        $M = $_GET + array("host" => $h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));
        $M["pass"] = $Nd;
        if ($Nd != "") $M["hashed"] = true;
        $yc[(DB == "" || $yc ? "" : idf_escape(addcslashes(DB, "%_\\"))) . ".*"] = array();
    }
    echo '<form action="" method="post">
<table cellspacing="0">
<tr><th>', lang(18), '<td><input name="host" maxlength="60" value="', h($M["host"]), '" autocapitalize="off">
<tr><th>', lang(19), '<td><input name="user" maxlength="16" value="', h($M["user"]), '" autocapitalize="off">
<tr><th>', lang(20), '<td><input name="pass" id="pass" value="', h($M["pass"]), '">
';
    if (!$M["hashed"]) {
        echo '<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';
    }
    echo
    checkbox("hashed", 1, $M["hashed"], lang(202), "typePassword(this.form['pass'], this.checked);"), '</table>

';
    echo "<table cellspacing='0'>\n", "<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/" . substr($h->server_info, 0, 3) . "/en/grant.html#priv_level' target='_blank' rel='noreferrer' class='help'>" . lang(50) . "</a>";
    $t = 0;
    foreach ($yc
             as $Id => $s) {
        echo '<th>' . ($Id != "*.*" ? "<input name='objects[$t]' value='" . h($Id) . "' size='10' autocapitalize='off'>" : "<input type='hidden' name='objects[$t]' value='*.*' size='10'>*.*");
        $t++;
    }
    echo "</thead>\n";
    foreach (array("" => "", "Server Admin" => lang(18), "Databases" => lang(21), "Tables" => lang(100), "Columns" => lang(101), "Procedures" => lang(203),) as $db => $tb) {
        foreach ((array)$Ce[$db] as $Be => $Xa) {
            echo "<tr" . odd() . "><td" . ($tb ? ">$tb<td" : " colspan='2'") . ' lang="en" title="' . h($Xa) . '">' . h($Be);
            $t = 0;
            foreach ($yc
                     as $Id => $s) {
                $F = "'grants[$t][" . h(strtoupper($Be)) . "]'";
                $Y = $s[strtoupper($Be)];
                if ($db == "Server Admin" && $Id != (isset($yc["*.*"]) ? "*.*" : ".*")) echo "<td>&nbsp;"; elseif (isset($_GET["grant"])) echo "<td><select name=$F><option><option value='1'" . ($Y ? " selected" : "") . ">" . lang(204) . "<option value='0'" . ($Y == "0" ? " selected" : "") . ">" . lang(205) . "</select>";
                else
                    echo "<td align='center'><label class='block'><input type='checkbox' name=$F value='1'" . ($Y ? " checked" : "") . ($Be == "All privileges" ? " id='grants-$t-all'" : ($Be == "Grant option" ? "" : " onclick=\"if (this.checked) formUncheck('grants-$t-all');\"")) . "></label>";
                $t++;
            }
        }
    }
    echo "</table>\n", '<p>
<input type="submit" value="', lang(138), '">
';
    if (isset($_GET["host"])) {
        echo '<input type="submit" name="drop" value="', lang(81), '"', confirm(), '>';
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["processlist"])) {
    if (support("kill") && $_POST && !$m) {
        $Yc = 0;
        foreach ((array)$_POST["kill"] as $X) {
            if (queries("KILL " . (+$X))) $Yc++;
        }
        queries_redirect(ME . "processlist=", lang(206, $Yc), $Yc || !$_POST["kill"]);
    }
    page_header(lang(73), $m);
    echo '
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" ondblclick="tableClick(event, true);" class="nowrap checkable">
';
    $t = -1;
    foreach (process_list() as $t => $M) {
        if (!$t) {
            echo "<thead><tr lang='en'>" . (support("kill") ? "<th>&nbsp;" : "");
            foreach ($M
                     as $z => $X) echo "<th>" . ($y == "sql" ? "<a href='http://dev.mysql.com/doc/refman/" . substr($h->server_info, 0, 3) . "/en/show-processlist.html#processlist_" . strtolower($z) . "' target='_blank' rel='noreferrer' class='help'>$z</a>" : $z);
            echo "</thead>\n";
        }
        echo "<tr" . odd() . ">" . (support("kill") ? "<td>" . checkbox("kill[]", $M["Id"], 0) : "");
        foreach ($M
                 as $z => $X) echo "<td>" . (($y == "sql" && $z == "Info" && ereg("Query|Killed", $M["Command"]) && $X != "") || ($y == "pgsql" && $z == "current_query" && $X != "<IDLE>") || ($y == "oracle" && $z == "sql_text" && $X != "") ? "<code class='jush-$y'>" . shorten_utf8($X, 100, "</code>") . ' <a href="' . h(ME . ($M["db"] != "" ? "db=" . urlencode($M["db"]) . "&" : "") . "sql=" . urlencode($X)) . '">' . lang(207) . '</a>' : nbsp($X));
        echo "\n";
    }
    echo '</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';
    if (support("kill")) {
        echo ($t + 1) . "/" . lang(208, $h->result("SELECT @@max_connections")), "<p><input type='submit' value='" . lang(209) . "'>\n";
    }
    echo '<input type="hidden" name="token" value="', $T, '">
</form>
';
} elseif (isset($_GET["select"])) {
    $b = $_GET["select"];
    $S = table_status1($b);
    $w = indexes($b);
    $o = fields($b);
    $q = column_foreign_keys($b);
    $Kd = "";
    if ($S["Oid"]) {
        $Kd = ($y == "sqlite" ? "rowid" : "oid");
        $w[] = array("type" => "PRIMARY", "columns" => array($Kd));
    }
    parse_str($_COOKIE["adminer_import"], $la);
    $We = array();
    $f = array();
    $Nf = null;
    foreach ($o
             as $z => $n) {
        $F = $c->fieldName($n);
        if (isset($n["privileges"]["select"]) && $F != "") {
            $f[$z] = html_entity_decode(strip_tags($F), ENT_QUOTES);
            if (is_shortable($n)) $Nf = $c->selectLengthProcess();
        }
        $We += $n["privileges"];
    }
    list($O, $zc) = $c->selectColumnsProcess($f, $w);
    $Rc = count($zc) < count($O);
    $Z = $c->selectSearchProcess($o, $w);
    $Xd = $c->selectOrderProcess($o, $w);
    $_ = $c->selectLimitProcess();
    $uc = ($O ? implode(", ", $O) : "*" . ($Kd ? ", $Kd" : "")) . convert_fields($f, $o, $O) . "\nFROM " . table($b);
    $_c = ($zc && $Rc ? "\nGROUP BY " . implode(", ", $zc) : "") . ($Xd ? "\nORDER BY " . implode(", ", $Xd) : "");
    if ($_GET["val"] && is_ajax()) {
        header("Content-Type: text/plain; charset=utf-8");
        foreach ($_GET["val"] as $kg => $M) {
            $ta = convert_field($o[key($M)]);
            echo $h->result("SELECT" . limit($ta ? $ta : idf_escape(key($M)) . " FROM " . table($b), " WHERE " . where_check($kg, $o) . ($Z ? " AND " . implode(" AND ", $Z) : "") . ($Xd ? " ORDER BY " . implode(", ", $Xd) : ""), 1));
        }
        exit;
    }
    if ($_POST && !$m) {
        $_g = $Z;
        if (is_array($_POST["check"])) $_g[] = "((" . implode(") OR (", array_map('where_check', $_POST["check"])) . "))";
        $_g = ($_g ? "\nWHERE " . implode(" AND ", $_g) : "");
        $ze = $mg = null;
        foreach ($w
                 as $v) {
            if ($v["type"] == "PRIMARY") {
                $ze = array_flip($v["columns"]);
                $mg = ($O ? $ze : array());
                break;
            }
        }
        foreach ((array)$mg
                 as $z => $X) {
            if (in_array(idf_escape($z), $O)) unset($mg[$z]);
        }
        if ($_POST["export"]) {
            cookie("adminer_import", "output=" . urlencode($_POST["output"]) . "&format=" . urlencode($_POST["format"]));
            dump_headers($b);
            $c->dumpTable($b, "");
            if (!is_array($_POST["check"]) || $mg === array()) $J = "SELECT $uc$_g$_c"; else {
                $ig = array();
                foreach ($_POST["check"] as $X) $ig[] = "(SELECT" . limit($uc, "\nWHERE " . ($Z ? implode(" AND ", $Z) . " AND " : "") . where_check($X, $o) . $_c, 1) . ")";
                $J = implode(" UNION ALL ", $ig);
            }
            $c->dumpData($b, "table", $J);
            exit;
        }
        if (!$c->selectEmailProcess($Z, $q)) {
            if ($_POST["save"] || $_POST["delete"]) {
                $K = true;
                $ma = 0;
                $J = table($b);
                $Q = array();
                if (!$_POST["delete"]) {
                    foreach ($f
                             as $F => $X) {
                        $X = process_input($o[$F]);
                        if ($X !== null) {
                            if ($_POST["clone"]) $Q[idf_escape($F)] = ($X !== false ? $X : idf_escape($F)); elseif ($X !== false) $Q[] = idf_escape($F) . " = $X";
                        }
                    }
                    $J .= ($_POST["clone"] ? " (" . implode(", ", array_keys($Q)) . ")\nSELECT " . implode(", ", $Q) . "\nFROM " . table($b) : " SET\n" . implode(",\n", $Q));
                }
                if ($_POST["delete"] || $Q) {
                    $Va = "UPDATE";
                    if ($_POST["delete"]) {
                        $Va = "DELETE";
                        $J = "FROM $J";
                    }
                    if ($_POST["clone"]) {
                        $Va = "INSERT";
                        $J = "INTO $J";
                    }
                    if ($_POST["all"] || ($mg === array() && is_array($_POST["check"])) || $Rc) {
                        $K = queries("$Va $J$_g");
                        $ma = $h->affected_rows;
                    } else {
                        foreach ((array)$_POST["check"] as $X) {
                            $K = queries($Va . limit1($J, "\nWHERE " . ($Z ? implode(" AND ", $Z) . " AND " : "") . where_check($X, $o)));
                            if (!$K) break;
                            $ma += $h->affected_rows;
                        }
                    }
                }
                $D = lang(210, $ma);
                if ($_POST["clone"] && $K && $ma == 1) {
                    $dd = last_id();
                    if ($dd) $D = lang(135, " $dd");
                }
                queries_redirect(remove_from_uri($_POST["all"] && $_POST["delete"] ? "page" : ""), $D, $K);
            } elseif (!$_POST["import"]) {
                if (!$_POST["val"]) $m = lang(211); else {
                    $K = true;
                    $ma = 0;
                    foreach ($_POST["val"] as $kg => $M) {
                        $Q = array();
                        foreach ($M
                                 as $z => $X) {
                            $z = bracket_escape($z, 1);
                            $Q[] = idf_escape($z) . " = " . (ereg('char|text', $o[$z]["type"]) || $X != "" ? $c->processInput($o[$z], $X) : "NULL");
                        }
                        $J = table($b) . " SET " . implode(", ", $Q);
                        $zg = " WHERE " . where_check($kg, $o) . ($Z ? " AND " . implode(" AND ", $Z) : "");
                        $K = queries("UPDATE" . ($Rc || $mg === array() ? " $J$zg" : limit1($J, $zg)));
                        if (!$K) break;
                        $ma += $h->affected_rows;
                    }
                    queries_redirect(remove_from_uri(), lang(210, $ma), $K);
                }
            } elseif (!is_string($jc = get_file("csv_file", true))) $m = upload_error($jc);
            elseif (!preg_match('~~u', $jc)) $m = lang(212);
            else {
                cookie("adminer_import", "output=" . urlencode($la["output"]) . "&format=" . urlencode($_POST["separator"]));
                $K = true;
                $Ua = array_keys($o);
                preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~', $jc, $od);
                $ma = count($od[0]);
                begin();
                $hf = ($_POST["separator"] == "csv" ? "," : ($_POST["separator"] == "tsv" ? "\t" : ";"));
                foreach ($od[0] as $z => $X) {
                    preg_match_all("~((?>\"[^\"]*\")+|[^$hf]*)$hf~", $X . $hf, $pd);
                    if (!$z && !array_diff($pd[1], $Ua)) {
                        $Ua = $pd[1];
                        $ma--;
                    } else {
                        $Q = array();
                        foreach ($pd[1] as $t => $Qa) $Q[idf_escape($Ua[$t])] = ($Qa == "" && $o[$Ua[$t]]["null"] ? "NULL" : q(str_replace('""', '"', preg_replace('~^"|"$~', '', $Qa))));
                        $K = insert_update($b, $Q, $ze);
                        if (!$K) break;
                    }
                }
                if ($K) queries("COMMIT");
                queries_redirect(remove_from_uri("page"), lang(213, $ma), $K);
                queries("ROLLBACK");
            }
        }
    }
    $Bf = $c->tableName($S);
    if (is_ajax()) ob_start();
    page_header(lang(32) . ": $Bf", $m);
    $Q = null;
    if (isset($We["insert"])) {
        $Q = "";
        foreach ((array)$_GET["where"] as $X) {
            if (count($q[$X["col"]]) == 1 && ($X["op"] == "=" || (!$X["op"] && !ereg('[_%]', $X["val"])))) $Q .= "&set" . urlencode("[" . bracket_escape($X["col"]) . "]") . "=" . urlencode($X["val"]);
        }
    }
    $c->selectLinks($S, $Q);
    if (!$f) echo "<p class='error'>" . lang(214) . ($o ? "." : ": " . error()) . "\n"; else {
        echo "<form action='' id='form'>\n", "<div style='display: none;'>";
        hidden_fields_get();
        echo(DB != "" ? '<input type="hidden" name="db" value="' . h(DB) . '">' . (isset($_GET["ns"]) ? '<input type="hidden" name="ns" value="' . h($_GET["ns"]) . '">' : "") : "");
        echo '<input type="hidden" name="select" value="' . h($b) . '">', "</div>\n";
        $c->selectColumnsPrint($O, $f);
        $c->selectSearchPrint($Z, $f, $w);
        $c->selectOrderPrint($Xd, $f, $w);
        $c->selectLimitPrint($_);
        $c->selectLengthPrint($Nf);
        $c->selectActionPrint($w);
        echo "</form>\n";
        $H = $_GET["page"];
        if ($H == "last") {
            $sc = $h->result("SELECT COUNT(*) FROM " . table($b) . ($Z ? " WHERE " . implode(" AND ", $Z) : ""));
            $H = floor(max(0, $sc - 1) / $_);
        }
        $J = $c->selectQueryBuild($O, $Z, $zc, $Xd, $_, $H);
        if (!$J) $J = "SELECT" . limit((+$_ && $zc && $Rc && $y == "sql" ? "SQL_CALC_FOUND_ROWS " : "") . $uc, ($Z ? "\nWHERE " . implode(" AND ", $Z) : "") . $_c, ($_ != "" ? +$_ : null), ($H ? $_ * $H : 0), "\n");
        echo $c->selectQuery($J);
        $K = $h->query($J);
        if (!$K) echo "<p class='error'>" . error() . "\n"; else {
            if ($y == "mssql" && $H) $K->seek($_ * $H);
            $Mb = array();
            echo "<form action='' method='post' enctype='multipart/form-data'>\n";
            $N = array();
            while ($M = $K->fetch_assoc()) {
                if ($H && $y == "oracle") unset($M["RNUM"]);
                $N[] = $M;
            }
            if ($_GET["page"] != "last") $sc = (+$_ && $zc && $Rc ? ($y == "sql" ? $h->result(" SELECT FOUND_ROWS()") : $h->result("SELECT COUNT(*) FROM ($J) x")) : count($N));
            if (!$N) echo "<p class='message'>" . lang(82) . "\n"; else {
                $_a = $c->backwardKeys($b, $Bf);
                echo "<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n", "<thead><tr>" . (!$zc && $O ? "" : "<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='" . h($_GET["modify"] ? remove_from_uri("modify") : $_SERVER["REQUEST_URI"] . "&modify=1") . "'>" . lang(215) . "</a>");
                $Dd = array();
                $xc = array();
                reset($O);
                $Ie = 1;
                foreach ($N[0] as $z => $X) {
                    if ($z != $Kd) {
                        $X = $_GET["columns"][key($O)];
                        $n = $o[$O ? ($X ? $X["col"] : current($O)) : $z];
                        $F = ($n ? $c->fieldName($n, $Ie) : "*");
                        if ($F != "") {
                            $Ie++;
                            $Dd[$z] = $F;
                            $e = idf_escape($z);
                            $Gc = remove_from_uri('(order|desc)[^=]*|page') . '&order%5B0%5D=' . urlencode($z);
                            $tb = "&desc%5B0%5D=1";
                            echo '<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">', '<a href="' . h($Gc . ($Xd[0] == $e || $Xd[0] == $z || (!$Xd && $Rc && $zc[0] == $e) ? $tb : '')) . '">';
                            echo (!$O || $X ? apply_sql_function($X["fun"], $F) : h(current($O))) . "</a>";
                            echo "<span class='column hidden'>", "<a href='" . h($Gc . $tb) . "' title='" . lang(38) . "' class='text'> ↓</a>";
                            if (!$X["fun"]) echo '<a href="#fieldset-search" onclick="selectSearch(\'' . h(js_escape($z)) . '\'); return false;" title="' . lang(35) . '" class="text jsonly"> =</a>';
                            echo "</span>";
                        }
                        $xc[$z] = $X["fun"];
                        next($O);
                    }
                }
                $jd = array();
                if ($_GET["modify"]) {
                    foreach ($N
                             as $M) {
                        foreach ($M
                                 as $z => $X) $jd[$z] = max($jd[$z], min(40, strlen(utf8_decode($X))));
                    }
                }
                echo ($_a ? "<th>" . lang(216) : "") . "</thead>\n";
                if (is_ajax()) {
                    if ($_ % 2 == 1 && $H % 2 == 1) odd();
                    ob_end_clean();
                }
                foreach ($c->rowDescriptions($N, $q) as $E => $M) {
                    $jg = unique_array($N[$E], $w);
                    if (!$jg) {
                        $jg = array();
                        foreach ($N[$E] as $z => $X) {
                            if (!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~', $z)) $jg[$z] = $X;
                        }
                    }
                    $kg = "";
                    foreach ($jg
                             as $z => $X) {
                        if (strlen($X) > 64) {
                            $z = "MD5(" . (strpos($z, '(') ? $z : idf_escape($z)) . ")";
                            $X = md5($X);
                        }
                        $kg .= "&" . ($X !== null ? urlencode("where[" . bracket_escape($z) . "]") . "=" . urlencode($X) : "null%5B%5D=" . urlencode($z));
                    }
                    echo "<tr" . odd() . ">" . (!$zc && $O ? "" : "<td>" . checkbox("check[]", substr($kg, 1), in_array(substr($kg, 1), (array)$_POST["check"]), "", "this.form['all'].checked = false; formUncheck('all-page');") . ($Rc || information_schema(DB) ? "" : " <a href='" . h(ME . "edit=" . urlencode($b) . $kg) . "'>" . lang(215) . "</a>"));
                    foreach ($M
                             as $z => $X) {
                        if (isset($Dd[$z])) {
                            $n = $o[$z];
                            if ($X != "" && (!isset($Mb[$z]) || $Mb[$z] != "")) $Mb[$z] = (is_mail($X) ? $Dd[$z] : "");
                            $A = "";
                            $X = $c->editVal($X, $n);
                            if ($X !== null) {
                                if (ereg('blob|bytea|raw|file', $n["type"]) && $X != "") $A = ME . 'download=' . urlencode($b) . '&field=' . urlencode($z) . $kg;
                                if ($X === "") $X = "&nbsp;"; elseif ($Nf != "" && is_shortable($n)) $X = shorten_utf8($X, max(0, +$Nf));
                                else$X = h($X);
                                if (!$A) {
                                    foreach ((array)$q[$z] as $p) {
                                        if (count($q[$z]) == 1 || end($p["source"]) == $z) {
                                            $A = "";
                                            foreach ($p["source"] as $t => $mf) $A .= where_link($t, $p["target"][$t], $N[$E][$mf]);
                                            $A = ($p["db"] != "" ? preg_replace('~([?&]db=)[^&]+~', '\\1' . urlencode($p["db"]), ME) : ME) . 'select=' . urlencode($p["table"]) . $A;
                                            if (count($p["source"]) == 1) break;
                                        }
                                    }
                                }
                                if ($z == "COUNT(*)") {
                                    $A = ME . "select=" . urlencode($b);
                                    $t = 0;
                                    foreach ((array)$_GET["where"] as $W) {
                                        if (!array_key_exists($W["col"], $jg)) $A .= where_link($t++, $W["col"], $W["val"], $W["op"]);
                                    }
                                    foreach ($jg
                                             as $Vc => $W) $A .= where_link($t++, $Vc, $W);
                                }
                            }
                            if (!$A && ($A = $c->selectLink($M[$z], $n)) === null) {
                                if (is_mail($M[$z])) $A = "mailto:$M[$z]";
                                if ($Fe = is_url($M[$z])) $A = ($Fe == "http" && $ba ? $M[$z] : "$Fe://www.adminer.org/redirect/?url=" . urlencode($M[$z]));
                            }
                            $u = h("val[$kg][" . bracket_escape($z) . "]");
                            $Y = $_POST["val"][$kg][bracket_escape($z)];
                            $Bc = h($Y !== null ? $Y : $M[$z]);
                            $nd = strpos($X, "<i>...</i>");
                            $Ib = is_utf8($X) && $N[$E][$z] == $M[$z] && !$xc[$z];
                            $Mf = ereg('text|lob', $n["type"]);
                            echo(($_GET["modify"] && $Ib) || $Y !== null ? "<td>" . ($Mf ? "<textarea name='$u' cols='30' rows='" . (substr_count($M[$z], "\n") + 1) . "'>$Bc</textarea>" : "<input name='$u' value='$Bc' size='$jd[$z]'>") : "<td id='$u' onclick=\"selectClick(this, event, " . ($nd ? 2 : ($Mf ? 1 : 0)) . ($Ib ? "" : ", '" . h(lang(217)) . "'") . ");\">" . $c->selectVal($X, $A, $n));
                        }
                    }
                    if ($_a) echo "<td>";
                    $c->backwardKeysPrint($_a, $N[$E]);
                    echo "</tr>\n";
                }
                if (is_ajax()) exit;
                echo "</table>\n", (!$zc && $O ? "" : "<script type='text/javascript'>tableCheck();</script>\n");
            }
            if (($N || $H) && !is_ajax()) {
                $Wb = true;
                if ($_GET["page"] != "last" && +$_ && !$Rc && ($sc >= $_ || $H)) {
                    $sc = found_rows($S, $Z);
                    if ($sc < max(1e4, 2 * ($H + 1) * $_)) $sc = reset(slow_query("SELECT COUNT(*) FROM " . table($b) . ($Z ? " WHERE " . implode(" AND ", $Z) : ""))); else$Wb = false;
                }
                if (+$_ && ($sc === false || $sc > $_ || $H)) {
                    echo "<p class='pages'>";
                    $rd = ($sc === false ? $H + (count($N) >= $_ ? 2 : 1) : floor(($sc - 1) / $_));
                    echo '<a href="' . h(remove_from_uri("page")) . "\" onclick=\"pageClick(this.href, +prompt('" . lang(218) . "', '" . ($H + 1) . "'), event); return false;\">" . lang(218) . "</a>:", pagination(0, $H) . ($H > 5 ? " ..." : "");
                    for ($t = max(1, $H - 4); $t < min($rd, $H + 5); $t++) echo
                    pagination($t, $H);
                    if ($rd > 0) {
                        echo($H + 5 < $rd ? " ..." : ""), ($Wb && $sc !== false ? pagination($rd, $H) : " <a href='" . h(remove_from_uri("page") . "&page=last") . "' title='~$rd'>" . lang(219) . "</a>");
                    }
                    echo(($sc === false ? count($N) + 1 : $sc - $H * $_) > $_ ? ' <a href="' . h(remove_from_uri("page") . "&page=" . ($H + 1)) . '" onclick="return !selectLoadMore(this, ' . (+$_) . ', \'' . lang(220) . '\');">' . lang(221) . '</a>' : '');
                }
                echo "<p>\n", ($sc !== false ? "(" . ($Wb ? "" : "~ ") . lang(119, $sc) . ") " : ""), checkbox("all", 1, 0, lang(222)) . "\n";
                if ($c->selectCommandPrint()) {
                    echo '<fieldset><legend>', lang(30), '</legend><div>
<input type="submit" value="', lang(138), '"', ($_GET["modify"] ? '' : ' title="' . lang(211) . '" class="jsonly"'), '>
<input type="submit" name="edit" value="', lang(30), '">
<input type="submit" name="clone" value="', lang(207), '">
<input type="submit" name="delete" value="', lang(141), '" onclick="return confirm(\'', lang(0);?> (' + (this.form['all'].checked ? <?php echo $sc, ' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';
                }
                $qc = $c->dumpFormat();
                foreach ((array)$_GET["columns"] as $e) {
                    if ($e["fun"]) {
                        unset($qc['sql']);
                        break;
                    }
                }
                if ($qc) {
                    print_fieldset("export", lang(111));
                    $fe = $c->dumpOutput();
                    echo($fe ? html_select("output", $fe, $la["output"]) . " " : ""), html_select("format", $qc, $la["format"]), " <input type='submit' name='export' value='" . lang(111) . "'>\n", "</div></fieldset>\n";
                }
            }
            if ($c->selectImportPrint()) {
                print_fieldset("import", lang(51), !$N);
                echo "<input type='file' name='csv_file'> ", html_select("separator", array("csv" => "CSV,", "csv;" => "CSV;", "tsv" => "TSV"), $la["format"], 1);
                echo " <input type='submit' name='import' value='" . lang(51) . "'>", "</div></fieldset>\n";
            }
            $c->selectEmailPrint(array_filter($Mb, 'strlen'), $f);
            echo "<p><input type='hidden' name='token' value='$T'></p>\n", "</form>\n";
        }
    }
    if (is_ajax()) {
        ob_end_clean();
        exit;
    }
} elseif (isset($_GET["variables"])) {
    $qf = isset($_GET["status"]);
    page_header($qf ? lang(75) : lang(74));
    $ug = ($qf ? show_status() : show_variables());
    if (!$ug) echo "<p class='message'>" . lang(82) . "\n"; else {
        echo "<table cellspacing='0'>\n";
        foreach ($ug
                 as $z => $X) {
            echo "<tr>", "<th><code class='jush-" . $y . ($qf ? "status" : "set") . "'>" . h($z) . "</code>", "<td>" . nbsp($X);
        }
        echo "</table>\n";
    }
} elseif (isset($_GET["script"])) {
    header("Content-Type: text/javascript; charset=utf-8");
    if ($_GET["script"] == "db") {
        $zf = array("Data_length" => 0, "Index_length" => 0, "Data_free" => 0);
        foreach (table_status() as $F => $S) {
            $u = js_escape($F);
            json_row("Comment-$u", nbsp($S["Comment"]));
            if (!is_view($S)) {
                foreach (array("Engine", "Collation") as $z) json_row("$z-$u", nbsp($S[$z]));
                foreach ($zf + array("Auto_increment" => 0, "Rows" => 0) as $z => $X) {
                    if ($S[$z] != "") {
                        $X = number_format($S[$z], 0, '.', lang(8));
                        json_row("$z-$u", ($z == "Rows" && $X && $S["Engine"] == ($of == "pgsql" ? "table" : "InnoDB") ? "~ $X" : $X));
                        if (isset($zf[$z])) $zf[$z] += ($S["Engine"] != "InnoDB" || $z != "Data_free" ? $S[$z] : 0);
                    } elseif (array_key_exists($z, $S)) json_row("$z-$u");
                }
            }
        }
        foreach ($zf
                 as $z => $X) json_row("sum-$z", number_format($X, 0, '.', lang(8)));
        json_row("");
    } elseif ($_GET["script"] == "kill") $h->query("KILL " . (+$_POST["kill"]));
    else {
        foreach (count_tables($c->databases()) as $l => $X) json_row("tables-" . js_escape($l), $X);
        json_row("");
    }
    exit;
} else {
    $Hf = array_merge((array)$_POST["tables"], (array)$_POST["views"]);
    if ($Hf && !$m && !$_POST["search"]) {
        $K = true;
        $D = "";
        if ($y == "sql" && count($_POST["tables"]) > 1 && ($_POST["drop"] || $_POST["truncate"] || $_POST["copy"])) queries("SET foreign_key_checks = 0");
        if ($_POST["truncate"]) {
            if ($_POST["tables"]) $K = truncate_tables($_POST["tables"]);
            $D = lang(223);
        } elseif ($_POST["move"]) {
            $K = move_tables((array)$_POST["tables"], (array)$_POST["views"], $_POST["target"]);
            $D = lang(224);
        } elseif ($_POST["copy"]) {
            $K = copy_tables((array)$_POST["tables"], (array)$_POST["views"], $_POST["target"]);
            $D = lang(225);
        } elseif ($_POST["drop"]) {
            if ($_POST["views"]) $K = drop_views($_POST["views"]);
            if ($K && $_POST["tables"]) $K = drop_tables($_POST["tables"]);
            $D = lang(226);
        } elseif ($y != "sql") {
            $K = ($y == "sqlite" ? queries("VACUUM") : apply_queries("VACUUM" . ($_POST["optimize"] ? "" : " ANALYZE"), $_POST["tables"]));
            $D = lang(227);
        } elseif (!$_POST["tables"]) $D = lang(7);
        elseif ($K = queries(($_POST["optimize"] ? "OPTIMIZE" : ($_POST["check"] ? "CHECK" : ($_POST["repair"] ? "REPAIR" : "ANALYZE"))) . " TABLE " . implode(", ", array_map('idf_escape', $_POST["tables"])))) {
            while ($M = $K->fetch_assoc()) $D .= "<b>" . h($M["Table"]) . "</b>: " . h($M["Msg_text"]) . "<br>";
        }
        queries_redirect(substr(ME, 0, -1), $D, $K);
    }
    page_header(($_GET["ns"] == "" ? lang(21) . ": " . h(DB) : lang(228) . ": " . h($_GET["ns"])), $m, true);
    if ($c->homepage()) {
        if ($_GET["ns"] !== "") {
            echo "<h3 id='tables-views'>" . lang(229) . "</h3>\n";
            $Gf = tables_list();
            if (!$Gf) echo "<p class='message'>" . lang(7) . "\n"; else {
                echo "<form action='' method='post'>\n", "<p>" . lang(230) . ": <input type='search' name='query' value='" . h($_POST["query"]) . "'> <input type='submit' name='search' value='" . lang(35) . "'>\n";
                if ($_POST["search"] && $_POST["query"] != "") search_tables();
                echo "<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);'>\n", '<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">', '<th>' . lang(100), '<td>' . lang(231), '<td>' . lang(79), '<td>' . lang(232), '<td>' . lang(233), '<td>' . lang(234), '<td>' . lang(92), '<td>' . lang(235), (support("comment") ? '<td>' . lang(94) : ''), "</thead>\n";
                foreach ($Gf
                         as $F => $U) {
                    $vg = ($U !== null && !eregi("table", $U));
                    echo '<tr' . odd() . '><td>' . checkbox(($vg ? "views[]" : "tables[]"), $F, in_array($F, $Hf, true), "", "formUncheck('check-all');"), '<th><a href="' . h(ME) . 'table=' . urlencode($F) . '" title="' . lang(25) . '">' . h($F) . '</a>';
                    if ($vg) {
                        echo '<td colspan="6"><a href="' . h(ME) . "view=" . urlencode($F) . '" title="' . lang(26) . '">' . lang(99) . '</a>', '<td align="right"><a href="' . h(ME) . "select=" . urlencode($F) . '" title="' . lang(24) . '">?</a>';
                    } else {
                        foreach (array("Engine" => array(), "Collation" => array(), "Data_length" => array("create", lang(27)), "Index_length" => array("indexes", lang(103)), "Data_free" => array("edit", lang(28)), "Auto_increment" => array("auto_increment=1&create", lang(27)), "Rows" => array("select", lang(24)),) as $z => $A) echo($A ? "<td align='right'><a href='" . h(ME . "$A[0]=") . urlencode($F) . "' id='$z-" . h($F) . "' title='$A[1]'>?</a>" : "<td id='$z-" . h($F) . "'>&nbsp;");
                    }
                    echo(support("comment") ? "<td id='Comment-" . h($F) . "'>&nbsp;" : "");
                }
                echo "<tr><td>&nbsp;<th>" . lang(208, count($Gf)), "<td>" . nbsp($y == "sql" ? $h->result("SELECT @@storage_engine") : ""), "<td>" . nbsp(db_collation(DB, collations()));
                foreach (array("Data_length", "Index_length", "Data_free") as $z) echo "<td align='right' id='sum-$z'>&nbsp;";
                echo "</table>\n", "<script type='text/javascript'>tableCheck();</script>\n";
                if (!information_schema(DB)) {
                    echo "<p>" . (ereg('^(sql|sqlite|pgsql)$', $y) ? ($y != "sqlite" ? "<input type='submit' value='" . lang(236) . "'> " : "") . "<input type='submit' name='optimize' value='" . lang(237) . "'> " : "") . ($y == "sql" ? "<input type='submit' name='check' value='" . lang(238) . "'> <input type='submit' name='repair' value='" . lang(239) . "'> " : "") . "<input type='submit' name='truncate' value='" . lang(240) . "'" . confirm("formChecked(this, /tables/)") . "> <input type='submit' name='drop' value='" . lang(81) . "'" . confirm("formChecked(this, /tables|views/)") . ">\n";
                    $k = (support("scheme") ? schemas() : $c->databases());
                    if (count($k) != 1 && $y != "sqlite") {
                        $l = (isset($_POST["target"]) ? $_POST["target"] : (support("scheme") ? $_GET["ns"] : DB));
                        echo "<p>" . lang(241) . ": ", ($k ? html_select("target", $k, $l) : '<input name="target" value="' . h($l) . '" autocapitalize="off">'), " <input type='submit' name='move' value='" . lang(242) . "'>", (support("copy") ? " <input type='submit' name='copy' value='" . lang(243) . "'>" : ""), "\n";
                    }
                    echo "<input type='hidden' name='token' value='$T'>\n";
                }
                echo "</form>\n";
            }
            echo '<p><a href="' . h(ME) . 'create=">' . lang(145) . "</a>\n";
            if (support("view")) echo '<a href="' . h(ME) . 'view=">' . lang(174) . "</a>\n";
            if (support("routine")) {
                echo "<h3 id='routines'>" . lang(114) . "</h3>\n";
                $af = routines();
                if ($af) {
                    echo "<table cellspacing='0'>\n", '<thead><tr><th>' . lang(155) . '<td>' . lang(89) . '<td>' . lang(191) . "<td>&nbsp;</thead>\n";
                    odd('');
                    foreach ($af
                             as $M) {
                        echo '<tr' . odd() . '>', '<th><a href="' . h(ME) . ($M["ROUTINE_TYPE"] != "PROCEDURE" ? 'callf=' : 'call=') . urlencode($M["ROUTINE_NAME"]) . '">' . h($M["ROUTINE_NAME"]) . '</a>', '<td>' . h($M["ROUTINE_TYPE"]), '<td>' . h($M["DTD_IDENTIFIER"]), '<td><a href="' . h(ME) . ($M["ROUTINE_TYPE"] != "PROCEDURE" ? 'function=' : 'procedure=') . urlencode($M["ROUTINE_NAME"]) . '">' . lang(106) . "</a>";
                    }
                    echo "</table>\n";
                }
                echo '<p>' . (support("procedure") ? '<a href="' . h(ME) . 'procedure=">' . lang(190) . '</a> ' : '') . '<a href="' . h(ME) . 'function=">' . lang(189) . "</a>\n";
            }
            if (support("event")) {
                echo "<h3 id='events'>" . lang(115) . "</h3>\n";
                $N = get_rows("SHOW EVENTS");
                if ($N) {
                    echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang(155) . "<td>" . lang(244) . "<td>" . lang(180) . "<td>" . lang(181) . "<td></thead>\n";
                    foreach ($N
                             as $M) {
                        echo "<tr>", "<th>" . h($M["Name"]), "<td>" . ($M["Execute at"] ? lang(245) . "<td>" . $M["Execute at"] : lang(182) . " " . $M["Interval value"] . " " . $M["Interval field"] . "<td>$M[Starts]"), "<td>$M[Ends]", '<td><a href="' . h(ME) . 'event=' . urlencode($M["Name"]) . '">' . lang(106) . '</a>';
                    }
                    echo "</table>\n";
                    $Vb = $h->result("SELECT @@event_scheduler");
                    if ($Vb && $Vb != "ON") echo "<p class='error'><code class='jush-sqlset'>event_scheduler</code>: " . h($Vb) . "\n";
                }
                echo '<p><a href="' . h(ME) . 'event=">' . lang(179) . "</a>\n";
            }
            if ($Gf) echo "<script type='text/javascript'>ajaxSetHtml('" . js_escape(ME) . "script=db');</script>\n";
        }
    }
}
page_footer();
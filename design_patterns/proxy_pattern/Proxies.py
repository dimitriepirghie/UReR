from AbstractProxy import AbstractProxy


class FacebookProxy(AbstractProxy):
    """
    Proxy which handles request related to Facebook
    """

    def __init__(self):
        """
        Default constructor
        """
        # TODO:
        # 1. Check API Key
        # 2. Caching mechanism ?
        # 3. Prepare HTTP API Request Object
        pass

    def serve_request(self, request=None):
        """
        Responde to a facebook request
        :param request:
        :return:
        """
        return "FacebookProxy Response"


    def facebook_helper(self):
        pass

    def facebook_helper2(self):
        pass


class LinkedInProxy(AbstractProxy):
    """
    Proxy which handles request related to LinkedIn
    """

    def __init__(self):
        """
        Default constructor
        """
        # TODO:
        # 1. Check API Key
        # 2. Caching mechanism ?
        # 3. Prepare HTTP API Request Object
        pass

    def serve_request(self, request=None):
        """
        Responde to a facebook request
        :param request:
        :return:
        """
        return "LinkedinProxyResponse"


    def linkedin_helper(self):
        pass

    def linkedin_helper2(self):
        pass


class FOAFProxy(AbstractProxy):
    """
    Proxy which handles request related to Friend Of A Friend API (May be internal API ?)
    """

    def __init__(self):
        """
        Default constructor
        """
        # TODO:
        # 1. Check API Key
        # 2. Caching mechanism ?
        # 3. Prepare HTTP API Request Object
        pass

    def serve_request(self, request=None):
        """
        Responde to a facebook request
        :param request:
        :return:
        """
        return "FOAFProxy response"

    def foaf_helper(self):
        pass

    def foaf_helper2(self):
        pass

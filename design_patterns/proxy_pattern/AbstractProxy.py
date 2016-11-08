from abc import abstractmethod, ABCMeta


class AbstractProxy(object):
    """
    Abstract Base Class for Proxy
    """

    __metaclass__ = ABCMeta

    @abstractmethod
    def serve_request(self, request=None):
        """
        Respond method for a request
        :param request:
        :return:
        """
        pass